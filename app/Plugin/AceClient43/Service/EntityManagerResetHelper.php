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
use Symfony\Component\Console\Output\OutputInterface;

class EntityManagerResetHelper
{
    /**
     * エンティティマネージャーをリセットする
     *
     * @param EntityManagerInterface $entityManager
     * @param ManagerRegistry $managerRegistry
     * @param OutputInterface $output
     *
     * @return ObjectManager
     */
    public static function resetEntityManager(EntityManagerInterface $entityManager, ManagerRegistry $managerRegistry, OutputInterface $output): ObjectManager
    {
        try {
            // このトランザクション内でのみロールバック
            if ($entityManager->getConnection()->isTransactionActive()) {
                $entityManager->rollback();
            }

            // 活性なトランザクションをロールバック
            if ($entityManager->isOpen() && $entityManager->getConnection()->isTransactionActive()) {
                $entityManager->rollback();
                $output->writeln('<comment>トランザクションをロールバックしました</comment>');
            }

            // エンティティマネージャーをクリア
            if ($entityManager->isOpen()) {
                $entityManager->clear();
            }

            // 完全にリセット
            $output->writeln('<info>エンティティマネージャーをリセットしました</info>');

            return $managerRegistry->resetManager();
        } catch (\Throwable $e) {
            $output->writeln(sprintf('<error>エンティティマネージャーのリセット中にエラーが発生しました: %s</error>', $e->getMessage()));
        }

        // エラーが発生した場合は、元のエンティティマネージャーを返す
        return $entityManager;
    }

    /**
     * エンティティマネージャーが閉じられている場合、再初期化する
     *
     * @param EntityManagerInterface $entityManager
     * @param ManagerRegistry $managerRegistry
     * @param OutputInterface $output
     *
     * @return ObjectManager
     */
    public static function resetIfNotOpen(
        EntityManagerInterface $entityManager,
        ManagerRegistry $managerRegistry,
        OutputInterface $output,
    ): ObjectManager {
        if ($entityManager->isOpen()) {
            return $entityManager;
        }

        $output->writeln('<comment>エンティティマネージャーが閉じられているため、再初期化します</comment>');
        $entityManager = $managerRegistry->resetManager();
        $output->writeln('<info>エンティティマネージャーをリセットしました</info>');

        return $entityManager;
    }
}
