<?php

namespace Customize\Entity;

use Doctrine\ORM\Mapping as ORM;

if (!class_exists(Fcode::class, false)) {
    /**
     * Job
     *
     * @ORM\Table(name="mtb_fcode")
     * @ORM\InheritanceType("SINGLE_TABLE")
     * @ORM\DiscriminatorColumn(name="discriminator_type", type="string", length=255)
     * @ORM\HasLifecycleCallbacks()
     * @ORM\Entity(repositoryClass="Customize\Repository\FcodeRepository")
     * @ORM\Cache(usage="NONSTRICT_READ_WRITE")
     */
    class Fcode extends \Eccube\Entity\Master\AbstractMasterEntity
    {
    }
}