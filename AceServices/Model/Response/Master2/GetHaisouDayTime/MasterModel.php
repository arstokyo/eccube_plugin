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
     * @var DaysTimeModel|null
     */
    protected ?DaysTimeModel $daysTime = null;

    /**
     * {@inheritDoc}
     */
    public function getDaysTime(): ?DaysTimeModel
    {
        return $this->daysTime;
    }

    /**
     * {@inheritDoc}
     */
    public function setDaysTime(?DaysTimeModel $daysTime): void
    {
        $this->daysTime = $daysTime;
    }
}
