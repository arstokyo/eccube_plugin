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

namespace Plugin\AceClient43\Traits;

use Doctrine\DBAL\Exception\ForeignKeyConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Eccube\Entity\Member;
use Eccube\Repository\MemberRepository;
use Plugin\AceClient43\Service\EntityManagerResetHelper;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Input\InputInterface;

trait ProductImportTrait
{
    /**
     * 文字列を DateTime オブジェクトに変換する
     *
     * @param string|null $dateTime 日時文字列（例: '2024-06-01', '-1 month', '+1 year', 'now'）
     * @param string $default
     *
     * @return \DateTime|null 変換された DateTime オブジェクト、変換失敗時は null
     */
    protected function toDateTime(?string $dateTime, string $default): ?\DateTime
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
     * @param LoggerInterface $logger
     * @param string $defaultFrom デフォルトの開始日
     * @param string $defaultTo デフォルトの終了日
     *
     * @return array|null [$updateFrom, $updateTo] の配列、検証失敗時は null
     */
    protected function validateDateTimeOptions(InputInterface $input, LoggerInterface $logger, string $defaultFrom = '-1 month', string $defaultTo = '+1 day'): ?array
    {
        $updateFromInput = $input->getOption('updateFrom');
        $updateToInput = $input->getOption('updateTo');

        $updateFrom = $this->toDateTime($updateFromInput, $defaultFrom);
        if ($updateFrom === null) {
            $logger->info(sprintf('<error>更新対象開始日が無効です: %s</error>', $updateFromInput));

            return null;
        }

        $updateTo = $this->toDateTime($updateToInput, $defaultTo);
        if ($updateTo === null) {
            $logger->info(sprintf('<error>更新対象終了日が無効です: %s</error>', $updateToInput));

            return null;
        }

        // 開始日が終了日より後の場合はエラー
        if ($updateFrom > $updateTo) {
            $logger->info(sprintf(
                '<error>更新対象日時の範囲が無効です: %s から %s</error>',
                $updateFrom->format('Y-m-d H:i:s'),
                $updateTo->format('Y-m-d H:i:s')
            ));

            return null;
        }

        return [$updateFrom, $updateTo];
    }

    /**
     * 作成者IDを検証する
     *
     * @param InputInterface $input
     * @param LoggerInterface $logger
     * @param MemberRepository $memberRepository
     *
     * @return Member|null
     */
    protected function validateCreatorId(InputInterface $input, LoggerInterface $logger, MemberRepository $memberRepository): ?Member
    {
        $creatorId = $input->getArgument('creatorId');
        if (!is_numeric($creatorId)) {
            $logger->error('<error>作成者IDは数値でなければなりません。</error>');

            return null;
        }

        $creator = $memberRepository->find($creatorId);
        if (null == $creator) {
            $logger->error('<error>指定された作成者IDに該当するメンバーが見つかりません。</error>');

            return null;
        }

        return $creator;
    }

    /**
     * エンティティを削除する
     *
     * @param array $entities 削除対象のエンティティの配列
     * @param LoggerInterface $logger
     * @param EntityManagerInterface $entityManager エンティティマネージャー
     * @param ManagerRegistry $managerRegistry マネージャーレジストリ
     */
    protected function removeEntities(array $entities, LoggerInterface $logger, EntityManagerInterface $entityManager, ManagerRegistry $managerRegistry): void
    {
        $removed = 0;
        $failed = 0;

        foreach ($entities as $entity) {
            try {
                $entityManager = EntityManagerResetHelper::resetIfNotOpen($entityManager, $managerRegistry, $logger);

                // エンティティがデタッチされている場合は再読み込み
                $className = get_class($entity);
                $id = method_exists($entity, 'getId') ? $entity->getId() : null;

                if ($id === null) {
                    $logger->info('<comment>エンティティにIDがないためスキップします</comment>');
                    $failed++;
                    continue;
                }

                // 毎回新しいエンティティを取得する
                $refreshedEntity = $entityManager->find($className, $id);
                if ($refreshedEntity === null) {
                    $logger->info(sprintf('<comment>エンティティが存在しないためスキップします: %s (ID: %s)</comment>', $className, $id));
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
                    $logger->info(sprintf('<info>エンティティを削除しました: %s (ID: %s)</info>', $className, $id));
                } catch (\Exception $e) {
                    // このトランザクション内でのみロールバック
                    if ($entityManager->getConnection()->isTransactionActive()) {
                        $entityManager->rollback();
                    }

                    throw $e; // 外部のcatchブロックで処理するために再スロー
                }
            } catch (ForeignKeyConstraintViolationException $e) {
                $logger->error(sprintf('<error>外部キー制約違反のため削除できません: %s (ID: %s): %s</error>',
                    get_class($entity), method_exists($entity, 'getId') ? $entity->getId() : '不明', $e->getMessage()));
                $failed++;

                // 問題が発生した場合はエンティティマネージャーをリセット
                $entityManager = EntityManagerResetHelper::resetEntityManager($entityManager, $managerRegistry, $logger);
            } catch (\Throwable $e) {
                $logger->error(sprintf('<error>エンティティの削除中にエラーが発生しました: %s (ID: %s): %s</error>',
                    get_class($entity), method_exists($entity, 'getId') ? $entity->getId() : '不明', $e->getMessage()));
                $failed++;

                // 問題が発生した場合はエンティティマネージャーをリセット
                $entityManager = EntityManagerResetHelper::resetEntityManager($entityManager, $managerRegistry, $logger);
            }
        }

        // 処理結果の集計を表示
        $logger->error(sprintf('<info>削除処理完了: 成功=%d件, 失敗=%d件</info>', $removed, $failed));
    }
}
