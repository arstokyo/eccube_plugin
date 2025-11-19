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

namespace Plugin\AceClient43;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Plugin\AbstractPluginManager;
use Plugin\AceClient43\Entity\Config as AceClientConfig;
use Plugin\AceClient43\Repository\ConfigRepository;
use Psr\Container\ContainerInterface;

/**
 * Class PluginManager.
 */
class PluginManager extends AbstractPluginManager
{
    /**
     * {@inheritdoc}
     */
    public function install(array $meta, $container)
    {
        $this->insertDefaultConfig($container);
        $this->updateProducts($container);
    }

    private function updateProducts(ContainerInterface $container): void
    {
        /** @var EntityManagerInterface $manager */
        $manager = $container->get('doctrine.orm.default_entity_manager');

        try {
            $manager->wrapInTransaction(function (EntityManagerInterface $em) {
                $em->getConnection()->executeStatement(
                    "UPDATE dtb_product_class SET ace_product_id = COALESCE(product_code, id) WHERE ace_product_id IS NULL OR ace_product_id = ''"
                );
            });
        } catch (\Throwable $e) {
            log_error('通販Aceの商品IDの更新に失敗しました: '.$e->getMessage());
            // ignore
        }
    }

    /**
     * Insert default config.
     *
     * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
     */
    public function insertDefaultConfig($container)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $container->get('doctrine')->getManager();

        /** @var ConfigRepository $configRepository */
        $configRepository = $entityManager->getRepository(AceClientConfig::class);

        if (\is_null($configRepository->get())) {
            $config = new AceClientConfig();
            $config->setSyid(99);

            $entityManager->persist($config);
            $entityManager->flush();
        }
    }
}
