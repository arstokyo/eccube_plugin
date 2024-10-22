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
    class Fname
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
        private $fname;

        /**
         * @ORM\Column(name="sort_no", type="smallint", options={"unsigned":true})
         */
        private $sort_no;

        // Getters and Setters
        public function getId(): ?int
        {
            return $this->id;
        }

        public function getFname(): ?string
        {
            return $this->fname;
        }

        public function setFname(string $fname): self
        {
            $this->fname = $fname;
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
            return $this->fname;
        }
    }
}