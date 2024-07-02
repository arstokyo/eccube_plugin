<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master2\GetHaisouDayTime;

/**
 * Class DaysTimeModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class DaysTimeModel implements DaysTimeModelInterface
{

    /** @var ?int $days 配送日数 */
    protected ?int $days = null;

    /** @var ?int $time 配送時間帯 */
    protected ?int $time = null;

    /**
     * {@inheritDoc}
     */
    public function getDays(): ?int
    {
        return $this->days;
    }

    /**
     * {@inheritDoc}
     */
    public function setDays(?int $days)
    {
        $this->days = $days;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTime(): ?int
    {
        return $this->time;
    }

    /**
     * {@inheritDoc}
     */
    public function setTime(?int $time)
    {
        $this->time = $time;
        return $this;
    }
}