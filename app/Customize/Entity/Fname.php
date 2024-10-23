<?php

namespace Customize\Entity;

use Doctrine\ORM\Mapping as ORM;

if (!class_exists(Fname::class, false)) {
    /**
     * Job
     *
     * @ORM\Table(name="mtb_fname")
     * @ORM\InheritanceType("SINGLE_TABLE")
     * @ORM\DiscriminatorColumn(name="discriminator_type", type="string", length=255)
     * @ORM\HasLifecycleCallbacks()
     * @ORM\Entity(repositoryClass="Customize\Repository\FnameRepository")
     * @ORM\Cache(usage="NONSTRICT_READ_WRITE")
     */
    class Fname extends \Eccube\Entity\Master\AbstractMasterEntity
    {
    }
}