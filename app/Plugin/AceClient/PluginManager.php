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
use Plugin\AceClient43\Repository\ConfigRepository;
use Plugin\AceClient43\Entity\Config as AceClientConfig;

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
