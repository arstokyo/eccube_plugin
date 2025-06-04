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

namespace Plugin\AceClient43\Util\ServiceRetriever;

use Doctrine\ORM\EntityManagerInterface;
use Plugin\AceClient43\Repository\ConfigRepository;

/**
 * Retriever for ConfigRepository.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class ConfigRepositoryRetriever
{
    private EntityManagerInterface $entityManager;
    private ConfigRepository $configRepository;

    /**
     * ServiceRetriveHelper constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param ConfigRepository $configRepository
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        ConfigRepository $configRepository,
    ) {
        $this->entityManager = $entityManager;
        $this->configRepository = $configRepository;
    }

    /**
     * Get the config repository.
     *
     * @return ConfigRepository
     */
    public function getConfigRepository(): ConfigRepository
    {
        return $this->configRepository;
    }

    /**
     * Get the entity manager.
     *
     * @return EntityManagerInterface
     */
    public function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }
}
