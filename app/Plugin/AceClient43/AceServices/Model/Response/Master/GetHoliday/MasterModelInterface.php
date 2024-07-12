<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetHoliday;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MasterModelInterface extends HasMessageModelInterface,
                                       AsListDenormalizableInterface
{
    /**
    * Get Calendar
    *
    * @return CalendarModel[]|null
    */
    public function getCalendar(): ?array;

    /**
     * Set Calendar
     *
     * @param CalendarModel[]|null $calendar
     * @return void
     */
    public function setCalendar(?array $calendar): void;
}