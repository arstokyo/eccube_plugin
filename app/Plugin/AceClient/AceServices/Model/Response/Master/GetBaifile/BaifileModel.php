<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetBaifile;

use Plugin\AceClient\AceServices\Model\Dependency\Baitai;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Class BaifileModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class BaifileModel implements BaifileModelInterface
{
    use Baitai\BcodeTrait,
        Baitai\BkCodeTrait,
        NoCategory\NameTrait,
        Good\SubNameTrait,
        Day\SdayTrait;

    /** @var ?int $keihi 媒体経費 */
    protected ?int $keihi = null;

    /** @var ?AceDateTime\AceDateTime $eday 媒体終了日 */
    protected ?AceDateTime\AceDateTime $eday = null;

    /** @var ?int $stopfg 中止区分 */
    protected ?int $stopfg = null;

    /** @var ?string $fcode1 フリーコード１ */
    protected ?string $fcode1 = null;

    /** @var ?string $fcode2 フリーコード２ */
    protected ?string $fcode2 = null;

    /**
     * {@inheritDoc}
     */
    public function getKeihi(): ?int
    {
        return $this->keihi;
    }

    /**
     * {@inheritDoc}
     */
    public function setKeihi(?int $keihi)
    {
        $this->keihi = $keihi;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getEday()
    {
        return $this->eday;
    }

    /**
     * {@inheritDoc}
     */
    public function setEday($eday)
    {
        $this->eday = AceDateTime\AceDateTimeFactory::makeAceDateTime($eday);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getStopfg(): ?int
    {
        return $this->stopfg;
    }

    /**
     * {@inheritDoc}
     */
    public function setStopfg(?int $stopfg)
    {
        $this->stopfg = $stopfg;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFcode1(): ?string
    {
        return $this->fcode1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFcode1(?string $fcode1)
    {
        $this->fcode1 = $fcode1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFcode2(): ?string
    {
        return $this->fcode2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFcode2(?string $fcode2)
    {
        $this->fcode2 = $fcode2;
        return $this;
    }
}