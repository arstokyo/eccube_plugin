<?php

namespace Plugin\AceClient\Utils\Helper;

use Plugin\AceClient\Repository\ConfigRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Helper for ServiceRetrive.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class ServiceRetrieveHelper
{

    /**
     * ServiceRetriveHelper constructor.
     * 
     * @param EntityManagerInterface $entityManager
     * @param ConfigRepository $configRepository
     */
    public function __construct(
        private EntityManagerInterface $entityManager,
        private ConfigRepository $configRepository
    )
    {
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