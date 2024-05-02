<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

use Plugin\AceClient\AceServices\Model\Dependency\Baitai\BaitaiNameTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Free\ThreeFnameTrait;
use Plugin\AceClient\AceServices\Model\Dependency\PC\FivePCKbnTrait;
use Plugin\AceClient\AceServices\Model\Dependency\KeiTai\FiveKeiKbnTrait;

/**
 * Trait For Person Level 5
 * 
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
trait PersonLevel5Trait
{
    use FivePCKbnTrait, FiveKeiKbnTrait, BaitaiNameTrait, ThreeFnameTrait;

    /** @var ?int $age 年齢 */
    protected ?int $age = null;

    /** @var ?int $blday 滞納者日付 */
    protected ?int $blday = null;

    /** @var ?int $blkbn 滞納者フラグ */
    protected ?int $blkbn = null;

    /** @var ?int $dadr DM送付先フラグ */
    protected ?int $dadr = null;

    /** @var ?int $gadr 商品送付先フラグ */
    protected ?int $gadr = null;

    /** @var ?int $point ポイント */
    protected ?int $point = null;

    /** @var ?string $upcodeSimei 紹介者 氏名 */
    protected ?string $upcodeSimei = null;

    /**
     * {@inheritDoc}
     * 
     */
    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getBlday(): ?int
    {
        return $this->blday;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getBlkbn(): ?int
    {
        return $this->blkbn;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getDadr(): ?int
    {
        return $this->dadr;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getGadr(): ?int
    {
        return $this->gadr;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getPoint(): ?int
    {
        return $this->point;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setAge(?int $age)
    {
        $this->age = $age;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setBlday(?int $blday)
    {
        $this->blday = $blday;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setBlkbn(?int $blkbn)
    {
        $this->blkbn = $blkbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setDadr(?int $dadr)
    {
        $this->dadr = $dadr;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setGadr(?int $gadr)
    {
        $this->gadr = $gadr;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setPoint(?int $point)
    {
        $this->point = $point;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getUpcodeSimei(): ?string
    {
        return $this->upcodeSimei;
    }
    
    /**
     * {@inheritDoc}
     * 
     */
    public function setUpcodeSimei(?string $upcodeSimei)
    {
        $this->upcodeSimei = $upcodeSimei;
        return $this;
    }

}