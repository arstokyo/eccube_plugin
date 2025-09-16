<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBaifile;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;
use Plugin\AceClient43\AceServices\Model\Dependency\Baitai;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class BaifileModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class BaifileModel implements BaifileModelInterface
{
    use Baitai\BcodeTrait;
    use Baitai\BkCodeTrait;
    use NoCategory\NameTrait;
    use Good\SubNameTrait;
    use Day\SdayTrait;

    /** @var ?int 媒体経費 */
    protected ?int $keihi = null;

    /** @var ?AceDateTime\AceDateTime 媒体終了日 */
    protected ?AceDateTime\AceDateTime $eday = null;

    /** @var ?int 中止区分 */
    protected ?int $stopfg = null;

    /** @var ?string フリーコード１ */
    protected ?string $fcode1 = null;

    /** @var ?string フリーコード２ */
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
