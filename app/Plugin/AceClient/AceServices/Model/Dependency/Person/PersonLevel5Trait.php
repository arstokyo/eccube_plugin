<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person;

use Plugin\AceClient43\AceServices\Model\Dependency\Baitai\BaitaiNameTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Free\ThreeFnameTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC\FivePCKbnTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC\FiveKeiKbnTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Mail\FiveMailTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Mail\MailTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Point\PointTrait;
use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Trait For Person Level 5
 *
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
trait PersonLevel5Trait 
{
    use FivePCKbnTrait,
        FiveKeiKbnTrait,
        FiveMailTrait,
        BaitaiNameTrait,
        PointTrait,
        ThreeFnameTrait,
        MailTrait;

    /** @var ?int $age 年齢 */
    protected ?int $age = null;

    /** @var ?AceDateTime\AceDateTime $blday 滞納者日付 */
    protected ?AceDateTime\AceDateTime $blday = null;

    /** @var ?int $blkbn 滞納者フラグ */
    protected ?int $blkbn = null;

    /** @var ?int $dadr DM送付先フラグ */
    protected ?int $dadr = null;

    /** @var ?int $gadr 商品送付先フラグ */
    protected ?int $gadr = null;

    /** @var ?string $upcodeSimei 紹介者 氏名 */
    protected ?string $upcodeSimei = null;

    /**
     * {@inheritDoc}
     */
    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * {@inheritDoc}
     */
    public function getBlday()
    {
        return $this->blday;
    }

    /**
     * {@inheritDoc}
     */
    public function getBlkbn(): ?int
    {
        return $this->blkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function getDadr(): ?int
    {
        return $this->dadr;
    }

    /**
     * {@inheritDoc}
     */
    public function getGadr(): ?int
    {
        return $this->gadr;
    }

    /**
     * {@inheritDoc}
     */
    public function setAge(?int $age)
    {
        $this->age = $age;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setBlday($blday)
    {
        $this->blday = AceDateTime\AceDateTimeFactory::makeAceDateTime($blday);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setBlkbn(?int $blkbn)
    {
        $this->blkbn = $blkbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setDadr(?int $dadr)
    {
        $this->dadr = $dadr;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setGadr(?int $gadr)
    {
        $this->gadr = $gadr;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getUpcodeSimei(): ?string
    {
        return $this->upcodeSimei;
    }

    /**
     * {@inheritDoc}
     */
    public function setUpcodeSimei(?string $upcodeSimei)
    {
        $this->upcodeSimei = $upcodeSimei;
        return $this;
    }

}