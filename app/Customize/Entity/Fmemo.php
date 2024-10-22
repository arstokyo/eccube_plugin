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
    class Fmemo
    {
        /**
         * @ORM\Id()
         * @ORM\GeneratedValue()
         * @ORM\Column(type="integer")
         */
        private $id;

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $fmemo;

        /**
         * @ORM\Column(name="sort_no", type="smallint", options={"unsigned":true})
         */
        private $sort_no;

        // Getters and Setters
        public function getId(): ?int
        {
            return $this->id;
        }

        public function getFmemo(): ?string
        {
            return $this->fmemo;
        }

        public function setFmemo(string $fmemo): self
        {
            $this->fmemo = $fmemo;
            return $this;
        }

        public function getSortNo(): ?int
        {
            return $this->sort_no;
        }

        public function setSortNo(int $sort_no): self
        {
            $this->sort_no = $sort_no;
            return $this;
        }

        public function __toString(): string
        {
            return $this->fmemo;
        }
    }
}