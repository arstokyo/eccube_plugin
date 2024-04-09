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

namespace Plugin\MailMagazine42\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Eccube\Repository\AbstractRepository;
use Doctrine\ORM\Query;
use Plugin\MailMagazine42\Entity\MailMagazineTemplate;

/**
 * MailMagazine.
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MailMagazineTemplateRepository extends AbstractRepository
{
    /**
     * MailMagazineTemplateRepository constructor.
     *
     * @param ManagerRegistry $registry
     * @param string $entityClass
     */
    public function __construct(ManagerRegistry $registry, $entityClass = MailMagazineTemplate::class)
    {
        parent::__construct($registry, $entityClass);
    }

    /**
     * find all.
     *
     * @return array
     */
    public function findAll()
    {
        $query = $this
            ->getEntityManager()
            ->createQuery('SELECT m FROM Plugin\MailMagazine42\Entity\MailMagazineTemplate m ORDER BY m.id DESC');
        $result = $query
            ->getResult(Query::HYDRATE_ARRAY);

        return $result;
    }
}
