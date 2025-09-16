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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetRireki;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\Payment;
use Plugin\AceClient43\AceServices\Model\Dependency\Rireki;

/**
 * Model for Rireki
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class RirekiModel extends Rireki\RirekiModelLevel1 implements RirekiModelInterface
{
    use Payment\PnameTrait;
    use Good\GtotalTrait;
    use Cost\Souryou\SouryouTrait;
    use Cost\Tesuu\TesuuTrait;
    use Cost\Nebiki\NebikiTrait;
    use Cost\TotalTrait;
    use Day\SdayTrait;
    use Day\UdayTrait;
    use Day\NdayTrait;
    use Denpyo\ZandakaTrait;
    use Haiso\HaisoModelGroup1Trait;
    use Cost\SyoukeiTrait;

    /** @var ?int 行番号 */
    protected ?int $rno = null;

    /** @var ?int 行数 */
    protected ?int $maxrow = null;

    /** @var ?string URL */
    protected ?string $url = null;

    /**
     * {@inheritDoc}
     */
    public function setSday($sday)
    {
        $this->sday = AceDateTime\AceDateTimeFactory::makeAceDateTime($sday, 'YmdHis');

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
