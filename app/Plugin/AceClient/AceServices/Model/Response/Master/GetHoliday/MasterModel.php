<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetHoliday;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class MasterModel implements MasterModelInterface
{
    use HasMessageModelTrait;
    /**
     * Calendar
     *
     * @var CalendarModel[]|null $calendar
     */
    protected ?array $calendar  = null;

    /**
     * {@inheritDoc}
     */
    function getCalendar(): ?array
    {
        return $this->calendar;
    }

    /**
    * {@inheritDoc}
    */
    function setCalendar(?array $calendar): void
    {
        $this->calendar = $calendar;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'Calendar' => CalendarModel::class
               ];
    }
}