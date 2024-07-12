<?php

namespace Plugin\AceClient43\Util\ServiceRetriever;

use Plugin\AceClient43\Repository\ConfigRepository;
use Doctrine\ORM\EntityManagerInterface;

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
    public function __construct
    (
        EntityManagerInterface $entityManager,
        ConfigRepository $configRepository
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