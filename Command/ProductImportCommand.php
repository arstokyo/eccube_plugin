<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\Command;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Eccube\Repository\MemberRepository;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\PreImportProductEvent;
use Plugin\AceClient43\Exception\CouldNotImportProductException;
use Plugin\AceClient43\Service\ProductImportHelper;
use Plugin\AceClient43\Traits\ProductImportTrait;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ProductImportCommand extends Command
{
    use ProductImportTrait;

    protected static $defaultName = 'eccube:aceclient:import-product';

    private EventDispatcherInterface $eventDispatcher;

    private MemberRepository $memberRepository;

    private ObjectManager $entityManager;

    private ProductImportHelper $productImportHelper;

    private ManagerRegistry $managerRegistry;

    public function __construct(
        EventDispatcherInterface $eventDispatcher,
        MemberRepository $memberRepository,
        EntityManagerInterface $entityManager,
        ProductImportHelper $productImportHelper,
        ManagerRegistry $managerRegistry,
    ) {
        parent::__construct();
        $this->eventDispatcher = $eventDispatcher;
        $this->memberRepository = $memberRepository;
        $this->entityManager = $entityManager;
        $this->productImportHelper = $productImportHelper;
        $this->managerRegistry = $managerRegistry;
    }

    protected function configure()
    {
        $this
            ->addArgument('creatorId', InputArgument::REQUIRED, '作成者ID')
            ->addOption('updateFrom', null, InputOption::VALUE_OPTIONAL, '更新対象開始日 (例: 2024-06-01, -1 month, -1 year)')
            ->addOption('updateTo', null, InputOption::VALUE_OPTIONAL, '更新対象終了日 (例: 2024-06-30, now, +1 month)、未指定時は+1 year')
            ->setHelp('このコマンドは通販Aceから商品をインポートします。')
            ->setDescription('通販Aceから商品をインポートするコマンド');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $creator = $this->validateCreatorId($input, $output, $this->memberRepository);
        if (null === $creator) {
            return Command::FAILURE;
        }

        $updateDates = $this->validateDateTimeOptions($input, $output, '-1 month', '+1 day');
        if (null === $updateDates) {
            return Command::FAILURE;
        }

        [$updateFrom, $updateTo] = $updateDates;
        $options = [
            '_trigger' => ProductImportCommand::class,
            '_remove_entities' => [],
            '_failed_product_codes' => [],
        ];

        $output->writeln('<info>通販Aceの商品をインポートしています</info>');
        $output->writeln(sprintf(
            '<info>期間: %s から %s まで</info>',
            $updateFrom->format('Y-m-d H:i:s'),
            $updateTo->format('Y-m-d H:i:s')
        ));

        try {
            if ($this->eventDispatcher->hasListeners(Events::COMMAND_PRE_IMPORT_PRODUCT)) {
                $event = new PreImportProductEvent($creator, $updateFrom, $updateTo, $input, $output, $options);
                $this->eventDispatcher->dispatch($event, Events::COMMAND_PRE_IMPORT_PRODUCT);

                if (!$event->continue) {
                    $output->writeln('<comment>インポート処理が中止されました。</comment>');

                    return Command::FAILURE;
                }
                $options = $event->options;
            }

            $importedCount = $this->productImportHelper->import($creator, $updateFrom, $updateTo, $options, $output);
            $this->entityManager->flush();
            $output->writeln(sprintf('<info>インポートされた商品数: %d</info>', $importedCount));
        } catch (CouldNotImportProductException $e) {
            $output->writeln(sprintf('<error>商品インポート中にエラーが発生しました: %s</error>', $e->getMessage()));

            return Command::FAILURE;
        } catch (\Throwable $e) {
            $output->writeln(sprintf('<error>予期しないエラーが発生しました: %s</error>', $e->getMessage()));

            // トランザクションがアクティブな場合のみロールバックを実行
            if ($this->entityManager instanceof EntityManagerInterface
                && $this->entityManager->getConnection()->isTransactionActive()) {
                $this->entityManager->rollback();
            }

            return Command::FAILURE;
        } finally {
            if (\count($options['_failed_product_codes']) > 0) {
                $output->writeln('<error>以下の商品のインポートに失敗しました:</error>');
                foreach ($options['_failed_product_codes'] as $code) {
                    $output->writeln(sprintf('<error> - %s</error>', $code));
                }
            }

            if (\count($options['_remove_entities']) > 0) {
                $this->removeEntities($options['_remove_entities'], $output, $this->entityManager, $this->managerRegistry);
            }
        }

        return Command::SUCCESS;
    }
}
