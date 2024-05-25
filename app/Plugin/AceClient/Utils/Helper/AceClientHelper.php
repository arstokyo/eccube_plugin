<?php

namespace Plugin\AceClient\Utils\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Service\Attribute\Required;

class AceClientHelper
{
    private EntityManagerInterface $entityManager;

    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }

    #[Required]
    public function setEntityManager(EntityManagerInterface $entityManager): void
    {
        $this->entityManager = $entityManager;
    }

}