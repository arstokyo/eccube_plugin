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

namespace Plugin\AceClient;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Plugin\AbstractPluginManager;
use Plugin\AceClient\Repository\ConfigRepository;
use Plugin\AceClient\Entity\Config as AceClientConfig;

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

            $entityManager->persist($config);
            $entityManager->flush();
        }
    }
    
}
