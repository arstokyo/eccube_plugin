<?php

namespace Customize\Entity;

use Doctrine\ORM\Mapping as ORM;

if (!class_exists(Fmemo::class, false)) {
    /**
     * Job
     *
     * @ORM\Table(name="mtb_fmemo")
     * @ORM\InheritanceType("SINGLE_TABLE")
     * @ORM\DiscriminatorColumn(name="discriminator_type", type="string", length=255)
     * @ORM\HasLifecycleCallbacks()
     * @ORM\Entity(repositoryClass="Customize\Repository\FmemoRepository")
     * @ORM\Cache(usage="NONSTRICT_READ_WRITE")
     */
    class Fmemo extends \Eccube\Entity\Master\AbstractMasterEntity
    {
    }
}