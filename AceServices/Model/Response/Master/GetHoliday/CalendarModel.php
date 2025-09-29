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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetHoliday;

use Plugin\AceClient43\AceServices\Model\Dependency\Day;

/**
 * Class CalendarModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class CalendarModel implements CalendarModelInterface
{
    use Day\DayTrait;

    /** @var ?string 倉庫ID */
    protected ?string $skid = null;

    /** @var ?int 休日区分 */
    protected ?int $holkbn = null;

    /** @var ?string メモ */
    protected ?string $memo = null;

    /** @var ?string 色 */
    protected ?string $frcolor = null;

    /** @var ?int メモの表示日数 */
    protected ?int $showdays = null;

    /**
     * {@inheritDoc}
     */
    public function getSkid(): ?string
    {
        return $this->skid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSkid(?string $skid)
    {
        $this->skid = $skid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getHolkbn(): ?int
    {
        return $this->holkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setHolkbn(?int $holkbn)
    {
        $this->holkbn = $holkbn;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMemo(): ?string
    {
        return $this->memo;
    }

    /**
     * {@inheritDoc}
     */
    public function setMemo(?string $memo)
    {
        $this->memo = $memo;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFrcolor(): ?string
    {
        return $this->frcolor;
    }

    /**
     * {@inheritDoc}
     */
    public function setFrcolor(?string $frcolor)
    {
        $this->frcolor = $frcolor;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getShowdays(): ?int
    {
        return $this->showdays;
    }

    /**
     * {@inheritDoc}
     */
    public function setShowdays(?int $showdays)
    {
        $this->showdays = $showdays;

        return $this;
    }
}
