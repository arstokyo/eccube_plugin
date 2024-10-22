<?php

namespace Customize\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;
use Eccube\Entity\Customer;
use Eccube\Entity\Master\Pref;
use \Doctrine\Common\Collections\Collection;
use Customize\Entity\Fmemo;
use Customize\Entity\Fcode;
use Customize\Entity\Fname;

/**
  * @EntityExtension("Eccube\Entity\Customer")
 */
trait CustomerTrait
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="mem_id", type="string", length=255, nullable=true, options={"comment":"ACE顧客ID"}, unique=true)
     */
    private ?string $mem_id = null;


    /**
     * Get the value of mem_id
     * 
     * @return string|null
     */
    public function getMemId(): ?string
    {
        return $this->mem_id;
    }

    /**
     * Set the value of mem_id
     * 
     * @param string|null $mem_id
     * @return self
     */
    public function setMemId(?string $mem_id): self
    {
        $this->mem_id = $mem_id;
        return $this;
    }

    /**
     * @ORM\ManyToOne(targetEntity=Fmemo::class)
     * @ORM\JoinColumn(name="fmemo1", referencedColumnName="id", nullable=true)
     */
    private $fmemo1;

    /**
     * @ORM\ManyToOne(targetEntity=Fmemo::class)
     * * @ORM\JoinColumn(name="fmemo2", referencedColumnName="id", nullable=true)
     */
    private $fmemo2;

    /**
     * @ORM\ManyToOne(targetEntity=Fmemo::class)
     * * @ORM\JoinColumn(name="fmemo3", referencedColumnName="id", nullable=true)
     */
    private $fmemo3;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fday1", type="datetime", nullable=true)
     */
    private $fday1;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fday2", type="datetime", nullable=true)
     */
    private $fday2;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fday3", type="datetime", nullable=true)
     */
    private $fday3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="free1", type="string", length=100, nullable=true)
     */
    private $free1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="free2", type="string", length=100, nullable=true)
     */
    private $free2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="free3", type="string", length=100, nullable=true)
     */
    private $free3;

    /**
     * @ORM\ManyToOne(targetEntity=Fcode::class)
     * * @ORM\JoinColumn(name="fcode1", referencedColumnName="id", nullable=true)
     */
    private $fcode1;

    /**
     * @ORM\ManyToOne(targetEntity=Fcode::class)
     * * @ORM\JoinColumn(name="fcode2", referencedColumnName="id", nullable=true)
     */
    private $fcode2;

    /**
     * @ORM\ManyToOne(targetEntity=Fcode::class)
     * * @ORM\JoinColumn(name="fcode3", referencedColumnName="id", nullable=true)
     */
    private $fcode3;

    /**
     * @ORM\ManyToOne(targetEntity=Fname::class)
     * * @ORM\JoinColumn(name="fname1", referencedColumnName="id", nullable=true)
     */
    private $fname1;

    /**
     * @ORM\ManyToOne(targetEntity=Fname::class)
     * * @ORM\JoinColumn(name="fname2", referencedColumnName="id", nullable=true)
     */
    private $fname2;

    /**
     * @ORM\ManyToOne(targetEntity=Fname::class)
     * * @ORM\JoinColumn(name="fname3", referencedColumnName="id", nullable=true)
     */
    private $fname3;


    /**
     * Get the value of fmemo1
     *
     * @return Fmemo|null
     */
    public function getFmemo1(): ?Fmemo
    {
        return $this->fmemo1;
    }

    /**
     * Set the value of fmemo1
     *
     * @param Fmemo|null $fmemo1
     * @return self
     */
    public function setFmemo1(?Fmemo $fmemo1): self
    {
        $this->fmemo1 = $fmemo1;
        return $this;
    }

    /**
     * Get the value of fmemo2
     *
     * @return Fmemo|null
     */
    public function getFmemo2(): ?Fmemo
    {
        return $this->fmemo2;
    }

    /**
     * Set the value of fmemo2
     *
     * @param Fmemo|null $fmemo2
     * @return self
     */
    public function setFmemo2(?Fmemo $fmemo2): self
    {
        $this->fmemo2 = $fmemo2;
        return $this;
    }

    /**
     * Get the value of fmemo3
     *
     * @return Fmemo|null
     */
    public function getFmemo3(): ?Fmemo
    {
        return $this->fmemo3;
    }

    /**
     * Set the value of fmemo3
     *
     * @param Fmemo|null $fmemo3
     * @return self
     */
    public function setFmemo3(?Fmemo $fmemo3): self
    {
        $this->fmemo3 = $fmemo3;
        return $this;
    }

    /**
     * Get the value of fday1
     *
     * @return \DateTime|null
     */
    public function getFday1(): \DateTime|null
    {
        return $this->fday1;
    }

    /**
     * Set the value of fday1
     *
     * @param string|null $fday1
     * @return CustomerTrait|Customer
     */
    public function setFday1($fday1): self
    {
        $this->fday1 = $fday1;
        return $this;
    }

    /**
     * Get the value of fday2
     *
     * @return \DateTime|null
     */
    public function getFday2(): \DateTime|null
    {
        return $this->fday2;
    }

    /**
     * Set the value of fday2
     *
     * @param string|null $fday2
     * @return CustomerTrait|Customer
     */
    public function setFday2($fday2): self
    {
        $this->fday2 = $fday2;
        return $this;
    }

    /**
     * Get the value of fday3
     *
     * @return \DateTime|null
     */
    public function getFday3(): \DateTime|null
    {
        return $this->fday3;
    }

    /**
     * Set the value of fday3
     *
     * @param string|null $fday3
     * @return CustomerTrait|Customer
     */
    public function setFday3($fday3): self
    {
        $this->fday3 = $fday3;
        return $this;
    }

    /**
     * Get the value of free1
     *
     * @return string|null
     */
    public function getFree1(): ?string
    {
        return $this->free1;
    }

    /**
     * Set the value of free1
     *
     * @param string|null $free1
     * @return self
     */
    public function setFree1(?string $free1): self
    {
        $this->free1 = $free1;
        return $this;
    }

    /**
     * Get the value of free2
     *
     * @return string|null
     */
    public function getFree2(): ?string
    {
        return $this->free2;
    }

    /**
     * Set the value of free2
     *
     * @param string|null $free2
     * @return self
     */
    public function setFree2(?string $free2): self
    {
        $this->free2 = $free2;
        return $this;
    }

    /**
     * Get the value of free3
     *
     * @return string|null
     */
    public function getFree3(): ?string
    {
        return $this->free3;
    }

    /**
     * Set the value of free3
     *
     * @param string|null $free3
     * @return self
     */
    public function setFree3(?string $free3): self
    {
        $this->free3 = $free3;
        return $this;
    }

    /**
     * Get the value of fcode1
     *
     * @return Fcode|null
     */
    public function getFcode1(): ?Fcode
    {
        return $this->fcode1;
    }

    /**
     * Set the value of fcode1
     *
     * @param Fcode|null $fcode1
     * @return self
     */
    public function setFcode1(?Fcode $fcode1): self
    {
        $this->fcode1 = $fcode1;
        return $this;
    }

    /**
     * Get the value of fcode2
     *
     * @return Fcode|null
     */
    public function getFcode2(): ?Fcode
    {
        return $this->fcode2;
    }

    /**
     * Set the value of fcode2
     *
     * @param Fcode|null $fcode2
     * @return self
     */
    public function setFcode2(?Fcode $fcode2): self
    {
        $this->fcode2 = $fcode2;
        return $this;
    }

    /**
     * Get the value of fcode3
     *
     * @return Fcode|null
     */
    public function getFcode3(): ?Fcode
    {
        return $this->fcode3;
    }

    /**
     * Set the value of fcode3
     *
     * @param Fcode|null $fcode3
     * @return self
     */
    public function setFcode3(?Fcode $fcode3): self
    {
        $this->fcode3 = $fcode3;
        return $this;
    }

    /**
     * Get the value of fname1
     *
     * @return Fname|null
     */
    public function getFname1(): ?Fname
    {
        return $this->fname1;
    }

    /**
     * Set the value of fname1
     *
     * @param Fname|null $fname1
     * @return self
     */
    public function setFname1(?Fname $fname1): self
    {
        $this->fname1 = $fname1;
        return $this;
    }

    /**
     * Get the value of fname2
     *
     * @return Fname|null
     */
    public function getFname2(): ?Fname
    {
        return $this->fname2;
    }

    /**
     * Set the value of fname2
     *
     * @param Fname|null $fname2
     * @return self
     */
    public function setFname2(?Fname $fname2): self
    {
        $this->fname2 = $fname2;
        return $this;
    }

    /**
     * Get the value of fname3
     *
     * @return Fname|null
     */
    public function getFname3(): ?Fname
    {
        return $this->fname3;
    }

    /**
     * Set the value of fname3
     *
     * @param Fname|null $fname3
     * @return self
     */
    public function setFname3(?Fname $fname3): self
    {
        $this->fname3 = $fname3;
        return $this;
    }
}
