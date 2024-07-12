<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master2\GetHaisouDayTime;

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
     * DaysTime
     *
     * @var DaysTimeModel|null $daysTime
     */
    protected ?DaysTimeModel $daysTime  = null;

    /**
     * {@inheritDoc}
     */
    function getDaysTime(): ?DaysTimeModel
    {
        return $this->daysTime;
    }

    /**
    * {@inheritDoc}
    */
    function setDaysTime(?DaysTimeModel $daysTime): void
    {
        $this->daysTime = $daysTime;
    }
}