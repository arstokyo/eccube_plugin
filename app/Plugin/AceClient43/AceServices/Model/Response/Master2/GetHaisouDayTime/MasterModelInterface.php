<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master2\GetHaisouDayTime;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;

/**
 * Interface for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MasterModelInterface extends HasMessageModelInterface
{
    /**
    * Get DaysTime
    *
    * @return DaysTimeModel|null
    */
    public function getDaysTime(): ?DaysTimeModel;

    /**
     * Set DaysTime
     *
     * @param DaysTimeModel|null $daysTime
     * @return void
     */
    public function setDaysTime(?DaysTimeModel $daysTime): void;
}