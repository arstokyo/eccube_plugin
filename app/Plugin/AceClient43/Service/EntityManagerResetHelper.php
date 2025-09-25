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

namespace Plugin\AceClient43\Service;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Psr\Log\LoggerInterface;

class EntityManagerResetHelper
{
    /**
     * エンティティマネージャーをリセットする
     *
     * @param EntityManagerInterface $entityManager
     * @param ManagerRegistry $managerRegistry
     * @param LoggerInterface|null $logger
     *
     * @return ObjectManager
     */
    public static function resetEntityManager(EntityManagerInterface $entityManager, ManagerRegistry $managerRegistry, ?LoggerInterface $logger = null): ObjectManager
    {
        try {
            // このトランザクション内でのみロールバック
            if ($entityManager->getConnection()->isTransactionActive()) {
                $entityManager->rollback();
            }

            // 活性なトランザクションをロールバック
            if ($entityManager->isOpen() && $entityManager->getConnection()->isTransactionActive()) {
                $entityManager->rollback();

                if ($logger) {
                    $logger->info('<comment>トランザクションをロールバックしました</comment>');
                }
            }

            // エンティティマネージャーをクリア
            if ($entityManager->isOpen()) {
                $entityManager->clear();
            }

            // 完全にリセット
            if ($logger) {
                $logger->info('<info>エンティティマネージャーをリセットしました</info>');
            }

            return $managerRegistry->resetManager();
        } catch (\Throwable $e) {
            if ($logger) {
                $logger->error(sprintf('<error>エンティティマネージャーのリセット中にエラーが発生しました: %s</error>', $e->getMessage()));
            }
        }

        // エラーが発生した場合は、元のエンティティマネージャーを返す
        return $entityManager;
    }

    /**
     * エンティティマネージャーが閉じられている場合、再初期化する
     *
     * @param EntityManagerInterface $entityManager
     * @param ManagerRegistry $managerRegistry
     * @param LoggerInterface|null $logger
     *
     * @return ObjectManager
     */
    public static function resetIfNotOpen(
        EntityManagerInterface $entityManager,
        ManagerRegistry $managerRegistry,
        ?LoggerInterface $logger = null,
    ): ObjectManager {
        if ($entityManager->isOpen()) {
            return $entityManager;
        }

        if ($logger) {
            $logger->info('<comment>エンティティマネージャーが閉じられているため、再初期化します</comment>');
        }

        $entityManager = $managerRegistry->resetManager();

        if ($logger) {
            $logger->info('<info>エンティティマネージャーをリセットしました</info>');
        }

        return $entityManager;
    }
}
