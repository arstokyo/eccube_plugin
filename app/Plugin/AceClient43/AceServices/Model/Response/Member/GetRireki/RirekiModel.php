<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetRireki;

use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Payment;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;
use Plugin\AceClient43\AceServices\Model\Dependency\Rireki;


/**
 * Model for Rireki
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class RirekiModel extends Rireki\RirekiModelLevel1 implements RirekiModelInterface
{
    use Payment\PnameTrait,
        Good\GtotalTrait,
        Cost\Souryou\SouryouTrait,
        Cost\Tesuu\TesuuTrait,
        Cost\Nebiki\NebikiTrait,
        Cost\TotalTrait,
        Day\SdayTrait,
        Day\UdayTrait,
        Day\NdayTrait,
        Denpyo\ZandakaTrait,
        Haiso\HaisoModelGroup1Trait,
        Cost\SyoukeiTrait;

    /** @var ?int $rno 行番号 */
    protected ?int $rno = null;

    /** @var ?int $maxrow 行数 */
    protected ?int $maxrow = null;

    /** @var ?string $url URL */
    protected ?string $url = null;

    /**
     * {@inheritDoc}
     */
    public function setSday($sday)
    {
        $this->sday = AceDateTime\AceDateTimeFactory::makeAceDateTime($sday,"YmdHis");
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getRno(): ?int
    {
        return $this->rno;
    }

    /**
     * {@inheritDoc}
     */
    public function setRno(?int $rno)
    {
        $this->rno = $rno;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMaxrow(): ?int
    {
        return $this->maxrow;
    }

    /**
     * {@inheritDoc}
     */
    public function setMaxrow(?int $maxrow)
    {
        $this->maxrow = $maxrow;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * {@inheritDoc}
     */
    public function setUrl(?string $url)
    {
        $this->url = $url;
        return $this;
    }
}