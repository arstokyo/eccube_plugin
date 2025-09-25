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
use Psr\Log\LoggerInterface;
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

    protected EventDispatcherInterface $eventDispatcher;

    protected MemberRepository $memberRepository;

    protected ObjectManager $entityManager;

    protected ProductImportHelper $productImportHelper;

    protected ManagerRegistry $managerRegistry;

    protected LoggerInterface $logger;

    public function __construct(
        EventDispatcherInterface $eventDispatcher,
        MemberRepository $memberRepository,
        EntityManagerInterface $entityManager,
        ProductImportHelper $productImportHelper,
        ManagerRegistry $managerRegistry,
        LoggerInterface $consoleLogger,
    ) {
        parent::__construct();
        $this->eventDispatcher = $eventDispatcher;
        $this->memberRepository = $memberRepository;
        $this->entityManager = $entityManager;
        $this->productImportHelper = $productImportHelper;
        $this->managerRegistry = $managerRegistry;
        $this->logger = $consoleLogger;
    }

    protected function configure()
    {
        $this
            ->addArgument('creatorId', InputArgument::REQUIRED, '作成者ID')
            ->addOption('updateFrom', null, InputOption::VALUE_OPTIONAL, '更新対象開始日 (例: 2024-06-01, -1 month, -1 year)')
            ->addOption('updateTo', null, InputOption::VALUE_OPTIONAL, '更新対象終了日 (例: 2024-06-30, now, +1 month)、未指定時は+1 year')
            ->addOption('chunkIndex', null, InputOption::VALUE_OPTIONAL, 'チャンクインデックス（リピートコマンド用）')
            ->addOption('totalChunks', null, InputOption::VALUE_OPTIONAL, '総チャンク数（リピートコマンド用）')
            ->addOption('repeatRound', null, InputOption::VALUE_OPTIONAL, 'リピートラウンド（リピートコマンド用）')
            ->setHelp('このコマンドは通販Aceから商品をインポートします。')
            ->setDescription('通販Aceから商品をインポートするコマンド');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $logger = $this->logger;
        $creator = $this->validateCreatorId($input, $logger, $this->memberRepository);
        if (null === $creator) {
            return Command::FAILURE;
        }

        $updateDates = $this->validateDateTimeOptions($input, $logger, '-1 month', '+1 day');
        if (null === $updateDates) {
            return Command::FAILURE;
        }

        [$updateFrom, $updateTo] = $updateDates;

        // Extract chunk information if provided
        $chunkIndex = $input->getOption('chunkIndex') !== null ? (int) $input->getOption('chunkIndex') : null;
        $totalChunks = $input->getOption('totalChunks') !== null ? (int) $input->getOption('totalChunks') : null;
        $repeatRound = $input->getOption('repeatRound') !== null ? (int) $input->getOption('repeatRound') : null;

        $options = [
            '_trigger' => ProductImportCommand::class,
            '_remove_entities' => [],
            '_failed_product_codes' => [],
            '_chunk_index' => $chunkIndex,
            '_total_chunks' => $totalChunks,
            '_repeat_round' => $repeatRound,
        ];

        $logger->info('<info>通販Aceの商品をインポートしています</info>');
        $logger->info(sprintf(
            '<info>期間: %s から %s まで</info>',
            $updateFrom->format('Y-m-d H:i:s'),
            $updateTo->format('Y-m-d H:i:s')
        ));

        if ($chunkIndex !== null && $totalChunks !== null && $repeatRound !== null) {
            $logger->info(sprintf(
                '<info>チャンク情報: %d/%d (リピートラウンド: %d)</info>',
                $chunkIndex + 1,
                $totalChunks,
                $repeatRound
            ));
        }

        try {
            if ($this->eventDispatcher->hasListeners(Events::COMMAND_PRE_IMPORT_PRODUCT)) {
                $event = new PreImportProductEvent($creator, $updateFrom, $updateTo, $input, $logger, $options, $chunkIndex, $totalChunks, $repeatRound);
                $this->eventDispatcher->dispatch($event, Events::COMMAND_PRE_IMPORT_PRODUCT);

                if (!$event->continue) {
                    $logger->info('<comment>インポート処理が中止されました。</comment>');

                    return Command::FAILURE;
                }
                $options = $event->options;
            }

            $importedCount = $this->productImportHelper->import($creator, $updateFrom, $updateTo, $options, $logger);
            $this->entityManager->flush();
            $logger->info(sprintf('<info>インポートされた商品数: %d</info>', $importedCount));
        } catch (CouldNotImportProductException $e) {
            $logger->error(sprintf('<error>商品インポート中にエラーが発生しました: %s</error>', $e->getMessage()));

            return Command::FAILURE;
        } catch (\Throwable $e) {
            $logger->error(sprintf('<error>予期しないエラーが発生しました: %s</error>', $e->getMessage()));

            // トランザクションがアクティブな場合のみロールバックを実行
            if ($this->entityManager instanceof EntityManagerInterface
                && $this->entityManager->getConnection()->isTransactionActive()) {
                $this->entityManager->rollback();
            }

            return Command::FAILURE;
        } finally {
            if (\count($options['_failed_product_codes']) > 0) {
                $logger->error('<error>以下の商品のインポートに失敗しました:</error>');
                foreach ($options['_failed_product_codes'] as $code) {
                    $logger->error(sprintf('<error> - %s</error>', $code));
                }
            }

            if (\count($options['_remove_entities']) > 0) {
                $this->removeEntities($options['_remove_entities'], $logger, $this->entityManager, $this->managerRegistry);
            }

            // clear the EntityManager for memory cleanup
            try {
                if ($this->entityManager->isOpen()) {
                    // Clear all managed entities to free memory
                    $this->entityManager->clear();
                    $logger->info('<info>エンティティマネージャーをクリアしました</info>');

                    // Optional: Report memory usage
                    $memoryUsage = memory_get_usage(true);
                    $peakMemory = memory_get_peak_usage(true);
                    $logger->info(sprintf('<info>メモリ使用量: 現在 %s MB, ピーク %s MB</info>',
                        round($memoryUsage / 1024 / 1024, 2),
                        round($peakMemory / 1024 / 1024, 2)
                    ));
                }
            } catch (\Throwable $e) {
                $logger->error(sprintf('<error>エンティティマネージャーのクリア中にエラーが発生しました: %s</error>', $e->getMessage()));
            }
        }

        return Command::SUCCESS;
    }
}
