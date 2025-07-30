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
use Plugin\AceClient43\Service\EntityManagerResetHelper;
use Plugin\AceClient43\Service\ProductImportHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ProductRepeatImportCommand extends Command
{
    protected static $defaultName = 'eccube:aceclient:import-product-repeat';

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
            ->addOption('duration', null, InputOption::VALUE_OPTIONAL, '時間区間の分割 (例: 6 months, 1 year)', '6 months')
            ->addOption('repeat', null, InputOption::VALUE_OPTIONAL, 'リピート回数 (0 = 1回のみ実行)', 0)
            ->addOption('updateFrom', null, InputOption::VALUE_OPTIONAL, '更新対象開始日 (例: -1 year, -6 months)', '-1 year')
            ->addOption('updateTo', null, InputOption::VALUE_OPTIONAL, '更新対象終了日 (例: now, -6 months)', 'now')
            ->setHelp('このコマンドは通販Aceから商品を繰り返しインポートします。')
            ->setDescription('通販Aceから商品を繰り返しインポートするコマンド');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $creator = $this->validateCreatorId($input, $output);
        if (null === $creator) {
            return Command::FAILURE;
        }

        $repeatCount = $this->validateRepeatCount($input, $output);
        if ($repeatCount === null) {
            return Command::FAILURE;
        }

        $duration = $this->validateDuration($input, $output);
        if ($duration === null) {
            return Command::FAILURE;
        }

        $updateDates = $this->validateDateTimeOptions($input, $output);
        if (null === $updateDates) {
            return Command::FAILURE;
        }

        [$updateFrom, $updateTo] = $updateDates;

        // 時間範囲をdurationで分割
        $timeChunks = $this->createTimeChunks($updateFrom, $updateTo, $duration);

        // repeat=0なら1回、repeat=2なら2回実行
        $totalRounds = max(1, $repeatCount);

        $output->writeln('<info>通販Aceの商品リピートインポートを開始します</info>');
        $output->writeln(sprintf('<info>全体実行回数: %d</info>', $totalRounds));
        $output->writeln(sprintf('<info>期間数: %d</info>', count($timeChunks)));
        $output->writeln(sprintf('<info>期間間隔: %s</info>', $duration));
        $output->writeln(sprintf(
            '<info>全体期間: %s から %s まで</info>',
            $updateFrom->format('Y-m-d H:i:s'),
            $updateTo->format('Y-m-d H:i:s')
        ));

        $output->writeln('<comment>=== 期間詳細 ===</comment>');
        foreach ($timeChunks as $index => $chunk) {
            $output->writeln(sprintf('<comment>期間 %d: %s ～ %s</comment>',
                $index + 1,
                $chunk['from']->format('Y-m-d H:i:s'),
                $chunk['to']->format('Y-m-d H:i:s')
            ));
        }
        $output->writeln('<comment>================================================================</comment>');

        $totalImported = [];

        // 全体処理をrepeat回数分実行
        for ($repeatRound = 1; $repeatRound <= $totalRounds; $repeatRound++) {
            $output->writeln(sprintf('<comment>===== 全体実行 %d/%d =====</comment>', $repeatRound, $totalRounds));
            $totalImported[$repeatRound] = 0;
            // 各期間を順番に実行
            foreach ($timeChunks as $chunkIndex => $chunk) {
                $chunkFrom = $chunk['from'];
                $chunkTo = $chunk['to'];

                $output->writeln(sprintf('<comment>--- 期間 %d/%d (全体実行 %d)---</comment>', $chunkIndex + 1, count($timeChunks), $repeatRound));
                $output->writeln(sprintf('<info>期間時間範囲: %s から %s まで</info>',
                    $chunkFrom->format('Y-m-d H:i:s'),
                    $chunkTo->format('Y-m-d H:i:s')
                ));

                try {
                    $result = $this->executeImport($creator, $chunkFrom, $chunkTo, $input, $output);
                    if ($result['success']) {
                        $totalImported[$repeatRound] += $result['count'];
                        $output->writeln(sprintf('<info>期間 %d 完了: インポートされた商品数: %d</info>',
                            $chunkIndex + 1, $result['count']));
                    } else {
                        $output->writeln(sprintf('<error>期間 %d でエラーが発生しました</error>', $chunkIndex + 1));

                        return Command::FAILURE;
                    }
                } catch (\Throwable $e) {
                    $output->writeln(sprintf('<error>期間 %d で予期しないエラーが発生しました: %s</error>',
                        $chunkIndex + 1, $e->getMessage()));

                    return Command::FAILURE;
                }
            }

            $output->writeln(sprintf('<info>全体実行 %d 完了</info>', $repeatRound));
        }

        $output->writeln(sprintf('<info>===== リピートインポート完了 =====</info>'));
        foreach ($totalImported as $repeatRound => $count) {
            $output->writeln(sprintf('<info>全体実行 %d 完了: インポートされた商品数: %d</info>', $repeatRound, $count));
        }

        return Command::SUCCESS;
    }

    /**
     * 単一のインポート処理を実行する
     *
     * @param Member $creator
     * @param \DateTime $updateFrom
     * @param \DateTime $updateTo
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return array ['success' => bool, 'count' => int]
     */
    private function executeImport(Member $creator, \DateTime $updateFrom, \DateTime $updateTo, InputInterface $input, OutputInterface $output): array
    {
        $options = [
            '_trigger' => ProductRepeatImportCommand::class,
            '_remove_entities' => [],
            '_failed_product_codes' => [],
        ];

        try {
            if ($this->eventDispatcher->hasListeners(Events::COMMAND_PRE_IMPORT_PRODUCT)) {
                $event = new PreImportProductEvent($creator, $updateFrom, $updateTo, $input, $output, $options);
                $this->eventDispatcher->dispatch($event, Events::COMMAND_PRE_IMPORT_PRODUCT);

                if (!$event->continue) {
                    $output->writeln('<comment>インポート処理が中止されました。</comment>');

                    return ['success' => false, 'count' => 0];
                }
                $options = $event->options;
            }

            $importedCount = $this->productImportHelper->import($creator, $updateFrom, $updateTo, $options, $output);
            $this->entityManager->flush();

            return ['success' => true, 'count' => $importedCount];
        } catch (CouldNotImportProductException $e) {
            $output->writeln(sprintf('<error>商品インポート中にエラーが発生しました: %s</error>', $e->getMessage()));

            return ['success' => false, 'count' => 0];
        } catch (\Throwable $e) {
            $output->writeln(sprintf('<error>予期しないエラーが発生しました: %s</error>', $e->getMessage()));

            // トランザクションがアクティブな場合のみロールバックを実行
            if ($this->entityManager->getConnection()->isTransactionActive()) {
                $this->entityManager->rollback();
            }

            return ['success' => false, 'count' => 0];
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
    }

    /**
     * 時間範囲をdurationで分割して期間を作成する
     *
     * @param \DateTime $fromDate
     * @param \DateTime $toDate
     * @param string $duration
     *
     * @return array
     */
    private function createTimeChunks(\DateTime $fromDate, \DateTime $toDate, string $duration): array
    {
        $chunks = [];
        $interval = \DateInterval::createFromDateString($duration);

        $currentFrom = clone $fromDate;
        $finalTo = clone $toDate;
        $chunkCount = 0;

        while ($currentFrom < $finalTo) {
            $chunkCount++;
            $currentTo = clone $currentFrom;
            $currentTo->add($interval);

            // 最後の期間は終了日まで
            if ($currentTo >= $finalTo) {
                $currentTo = clone $finalTo;
                if ($currentFrom->getTimestamp() < $currentTo->getTimestamp()) {
                    $chunks[] = [
                        'from' => clone $currentFrom,
                        'to' => clone $currentTo,
                    ];
                }
                break; // 最後の期間なので終了
            }

            $chunks[] = [
                'from' => clone $currentFrom,
                'to' => clone $currentTo,
            ];

            $currentFrom = clone $currentTo;
        }

        return $chunks;
    }

    /**
     * リピート回数を検証する
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int|null
     */
    private function validateRepeatCount(InputInterface $input, OutputInterface $output): ?int
    {
        $repeat = $input->getOption('repeat');

        if (!is_numeric($repeat)) {
            $output->writeln('<error>リピート回数は数値でなければなりません。</error>');

            return null;
        }

        $repeatCount = (int) $repeat;
        if ($repeatCount < 0) {
            $output->writeln('<error>リピート回数は0以上でなければなりません。</error>');

            return null;
        }

        return $repeatCount;
    }

    /**
     * 待機時間を検証する
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return string|null
     */
    private function validateDuration(InputInterface $input, OutputInterface $output): ?string
    {
        $duration = $input->getOption('duration');

        try {
            $interval = \DateInterval::createFromDateString($duration);
            if ($interval === false) {
                throw new \Exception('Invalid duration format');
            }

            return $duration;
        } catch (\Exception $e) {
            $output->writeln(sprintf('<error>デュレーションの形式が無効です: %s</error>', $duration));

            return null;
        }
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

        $updateFrom = $this->toDateTime($updateFromInput, '-1 year');
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
                $entityManager = $this->entityManager;
                $entityManager = EntityManagerResetHelper::resetIfNotOpen($entityManager, $this->managerRegistry, $output);

                // エンティティがデタッチされている場合は再読み込み
                $className = get_class($entity);
                $id = method_exists($entity, 'getId') ? $entity->getId() : null;

                if ($id === null) {
                    $output->writeln('<comment>エンティティにIDがないためスキップします</comment>');
                    $failed++;
                    continue;
                }

                // 毎回新しいエンティティを取得する
                $refreshedEntity = $entityManager->find($className, $id);
                if ($refreshedEntity === null) {
                    $output->writeln(sprintf('<comment>エンティティが存在しないためスキップします: %s (ID: %s)</comment>', $className, $id));
                    $failed++;
                    continue;
                }

                // トランザクションを開始して削除操作を実行
                $entityManager->beginTransaction();

                try {
                    $entityManager->remove($refreshedEntity);
                    $entityManager->flush();
                    $entityManager->commit();

                    $removed++;
                    $output->writeln(sprintf('<info>エンティティを削除しました: %s (ID: %s)</info>', $className, $id));
                } catch (\Exception $e) {
                    // このトランザクション内でのみロールバック
                    if ($entityManager->getConnection()->isTransactionActive()) {
                        $entityManager->rollback();
                    }

                    throw $e; // 外部のcatchブロックで処理するために再スロー
                }
            } catch (ForeignKeyConstraintViolationException $e) {
                $output->writeln(sprintf('<error>外部キー制約違反のため削除できません: %s (ID: %s): %s</error>',
                    get_class($entity), method_exists($entity, 'getId') ? $entity->getId() : '不明', $e->getMessage()));
                $failed++;

                // 問題が発生した場合はエンティティマネージャーをリセット
                $this->entityManager = EntityManagerResetHelper::resetEntityManager($entityManager, $this->managerRegistry, $output);
            } catch (\Throwable $e) {
                $output->writeln(sprintf('<error>エンティティの削除中にエラーが発生しました: %s (ID: %s): %s</error>',
                    get_class($entity), method_exists($entity, 'getId') ? $entity->getId() : '不明', $e->getMessage()));
                $failed++;

                // 問題が発生した場合はエンティティマネージャーをリセット
                $this->entityManager = EntityManagerResetHelper::resetEntityManager($entityManager, $this->managerRegistry, $output);
            }
        }

        // 処理結果の集計を表示
        $output->writeln(sprintf('<info>削除処理完了: 成功=%d件, 失敗=%d件</info>', $removed, $failed));
    }
}
