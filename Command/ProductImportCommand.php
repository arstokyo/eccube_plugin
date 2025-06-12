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

use Doctrine\DBAL\Exception\ForeignKeyConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Eccube\Entity\Member;
use Eccube\Repository\MemberRepository;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\PreImportProductEvent;
use Plugin\AceClient43\Exception\CouldNotImportProductException;
use Plugin\AceClient43\Service\ProductImportHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ProductImportCommand extends Command
{
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
        $creator = $this->validateCreatorId($input, $output);
        if (null === $creator) {
            return Command::FAILURE;
        }

        $updateDates = $this->validateDateTimeOptions($input, $output);
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
            if ($this->entityManager->getConnection()->isTransactionActive()) {
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
                $this->removeEntities($options['_remove_entities'], $output);
            }
        }

        return Command::SUCCESS;
    }

    /**
     * 文字列を DateTime オブジェクトに変換する
     *
     * @param string|null $dateTime 日時文字列（例: '2024-06-01', '-1 month', '+1 year', 'now'）
     * @param string $default
     *
     * @return \DateTime|null 変換された DateTime オブジェクト、変換失敗時は null
     */
    private function toDateTime(?string $dateTime, string $default): ?\DateTime
    {
        if (empty($dateTime)) {
            $dateTime = $default;
        }

        try {
            return new \DateTime($dateTime);
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * 入力された日時パラメータを検証して DateTime オブジェクトに変換する
     *
     * @param InputInterface $input コマンド入力
     * @param OutputInterface $output コマンド出力
     *
     * @return array|null [$updateFrom, $updateTo] の配列、検証失敗時は null
     */
    private function validateDateTimeOptions(InputInterface $input, OutputInterface $output): ?array
    {
        $updateFromInput = $input->getOption('updateFrom');
        $updateToInput = $input->getOption('updateTo');

        $updateFrom = $this->toDateTime($updateFromInput, '-1 month');
        if ($updateFrom === null) {
            $output->writeln(sprintf('<error>更新対象開始日が無効です: %s</error>', $updateFromInput));

            return null;
        }

        $updateTo = $this->toDateTime($updateToInput, '+1 day');
        if ($updateTo === null) {
            $output->writeln(sprintf('<error>更新対象終了日が無効です: %s</error>', $updateToInput));

            return null;
        }

        // 開始日が終了日より後の場合はエラー
        if ($updateFrom > $updateTo) {
            $output->writeln(sprintf(
                '<error>更新対象日時の範囲が無効です: %s から %s</error>',
                $updateFrom->format('Y-m-d H:i:s'),
                $updateTo->format('Y-m-d H:i:s')
            ));

            return null;
        }

        return [$updateFrom, $updateTo];
    }

    private function validateCreatorId(InputInterface $input, OutputInterface $output): ?Member
    {
        $creatorId = $input->getArgument('creatorId');
        if (!is_numeric($creatorId)) {
            $output->writeln('<error>作成者IDは数値でなければなりません。</error>');

            return null;
        }

        $creator = $this->memberRepository->find($creatorId);
        if (null == $creator) {
            $output->writeln('<error>指定された作成者IDに該当するメンバーが見つかりません。</error>');

            return null;
        }

        return $creator;
    }

    /**
     * エンティティを削除する
     *
     * @param array $entities 削除対象のエンティティの配列
     * @param OutputInterface $output 出力インターフェース
     */
    private function removeEntities(array $entities, OutputInterface $output): void
    {
        $removed = 0;
        $failed = 0;

        foreach ($entities as $entity) {
            try {
                // エンティティマネージャーの状態をリセット
                if (!$this->entityManager->isOpen()) {
                    $output->writeln('<comment>エンティティマネージャーが閉じられているため、再初期化します</comment>');
                    $this->entityManager = $this->managerRegistry->resetManager();
                    $output->writeln('<info>エンティティマネージャーをリセットしました</info>');
                }

                // エンティティがデタッチされている場合は再読み込み
                $className = get_class($entity);
                $id = method_exists($entity, 'getId') ? $entity->getId() : null;

                if ($id === null) {
                    $output->writeln('<comment>エンティティにIDがないためスキップします</comment>');
                    $failed++;
                    continue;
                }

                // 毎回新しいエンティティを取得する
                $refreshedEntity = $this->entityManager->find($className, $id);
                if ($refreshedEntity === null) {
                    $output->writeln(sprintf('<comment>エンティティが存在しないためスキップします: %s (ID: %s)</comment>', $className, $id));
                    $failed++;
                    continue;
                }

                // トランザクションを開始して削除操作を実行
                $this->entityManager->beginTransaction();

                try {
                    $this->entityManager->remove($refreshedEntity);
                    $this->entityManager->flush();
                    $this->entityManager->commit();

                    $removed++;
                    $output->writeln(sprintf('<info>エンティティを削除しました: %s (ID: %s)</info>', $className, $id));
                } catch (\Exception $e) {
                    // このトランザクション内でのみロールバック
                    if ($this->entityManager->getConnection()->isTransactionActive()) {
                        $this->entityManager->rollback();
                    }

                    throw $e; // 外部のcatchブロックで処理するために再スロー
                }
            } catch (ForeignKeyConstraintViolationException $e) {
                $output->writeln(sprintf('<error>外部キー制約違反のため削除できません: %s (ID: %s): %s</error>',
                    get_class($entity), method_exists($entity, 'getId') ? $entity->getId() : '不明', $e->getMessage()));
                $failed++;

                // 問題が発生した場合はエンティティマネージャーをリセット
                $this->resetEntityManager($output);
            } catch (\Throwable $e) {
                $output->writeln(sprintf('<error>エンティティの削除中にエラーが発生しました: %s (ID: %s): %s</error>',
                    get_class($entity), method_exists($entity, 'getId') ? $entity->getId() : '不明', $e->getMessage()));
                $failed++;

                // 問題が発生した場合はエンティティマネージャーをリセット
                $this->resetEntityManager($output);
            }
        }

        // 処理結果の集計を表示
        $output->writeln(sprintf('<info>削除処理完了: 成功=%d件, 失敗=%d件</info>', $removed, $failed));
    }

    /**
     * エンティティマネージャーをリセットする
     *
     * @param OutputInterface $output
     */
    private function resetEntityManager(OutputInterface $output): void
    {
        try {
            // 活性なトランザクションをロールバック
            if ($this->entityManager->isOpen() && $this->entityManager->getConnection()->isTransactionActive()) {
                $this->entityManager->rollback();
                $output->writeln('<comment>トランザクションをロールバックしました</comment>');
            }

            // エンティティマネージャーをクリア
            if ($this->entityManager->isOpen()) {
                $this->entityManager->clear();
            }

            // 完全にリセット
            $this->entityManager = $this->managerRegistry->resetManager();
            $output->writeln('<info>エンティティマネージャーをリセットしました</info>');
        } catch (\Throwable $e) {
            $output->writeln(sprintf('<error>エンティティマネージャーのリセット中にエラーが発生しました: %s</error>', $e->getMessage()));
        }
    }
}
