<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master2\GetHaisouDayTime;

/**
 * Interface for DaysTimeModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface DaysTimeModelInterface
{
    /**
     * Get 配送日数
     *
     * @return ?int
     */
    public function getDays(): ?int;

    /**
     * Set 配送日数
     *
     * @param ?int $days
     * @return $this
     */
    public function setDays(?int $days): static;

    /**
     * Get 配送時間帯
     *
     * @return ?int
     */
    public function getTime(): ?int;

    /**
     * Set 配送時間帯
     *
     * @param ?int $time
     * @return $this
     */
    public function setTime(?int $time): static;
}