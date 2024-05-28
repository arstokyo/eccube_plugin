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
use Symfony\Component\DependencyInjection\ContainerInterface;
use Plugin\AceClient\Repository\ConfigRepository;
use Plugin\AceClient\Entity\Config as AceClientConfig;
use Plugin\AceClient\Util\HttpClient\HttpClientFactory;
use Plugin\AceClient\Util\Logger\LoggerFactory;

/**
 * Class PluginManager.
 */
class PluginManager extends AbstractPluginManager
{

    /**
     * @param array $meta
     * @param ContainerInterface $container
     */
    public function enable(array $meta, ContainerInterface $container)
    {
        $this->insertDefaultConfig($container);
    }

    /**
     * @param array $meta
     * @param ContainerInterface $container
     */
    public function disable(array $meta, ContainerInterface $container)
    {
        $this->cleanConfig($container);
    }

    /**
     * Insert default config.
     * 
     * @param ContainerInterface $container
     * 
     * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
     */
    public function insertDefaultConfig(ContainerInterface $container)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $container->get('doctrine')->getManager();

        /** @var ConfigRepository $configRepository */
        $configRepository = $entityManager->getRepository(AceClientConfig::class);

        if (\is_null($configRepository->get())) {
            $config = new AceClientConfig();
            $config->setBaseUri(HttpClientFactory::DEFAULT_BASE_URL);
            $config->setIsLogOn(LoggerFactory::DEFAULT_LOG_ON);

            $entityManager->persist($config);
            $entityManager->flush();
        }
    }

    /**
     * Clean config.
     * 
     * @param ContainerInterface $container
     * 
     * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
     */
    public function cleanConfig(ContainerInterface $container)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $container->get('doctrine')->getManager();

        /** @var ConfigRepository $configRepository */
        $configRepository = $entityManager->getRepository(AceClientConfig::class);

        $config = $configRepository->get();
        if (!\is_null($config)) {
            $entityManager->remove($config);
            $entityManager->flush();
        }
    }
    
}
