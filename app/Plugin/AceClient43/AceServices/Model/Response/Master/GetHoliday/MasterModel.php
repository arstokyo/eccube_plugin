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

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

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
     * @var CalendarModel[]|null
     */
    protected ?array $calendar = null;

    /**
     * {@inheritDoc}
     */
    public function getCalendar(): ?array
    {
        return $this->calendar;
    }

    /**
     * {@inheritDoc}
     */
    public function setCalendar(?array $calendar): void
    {
        $this->calendar = $calendar;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'Calendar' => CalendarModel::class,
        ];
    }
}
