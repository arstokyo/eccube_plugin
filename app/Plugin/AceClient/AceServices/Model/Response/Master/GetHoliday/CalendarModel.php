<?php

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

    /** @var ?string $skid 倉庫ID */
    protected ?string $skid = null;

    /** @var ?int $holkbn 休日区分 */
    protected ?int $holkbn = null;

    /** @var ?string $memo メモ */
    protected ?string $memo = null;

    /** @var ?string $frcolor 色 */
    protected ?string $frcolor = null;

    /** @var ?int $showdays メモの表示日数 */
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
