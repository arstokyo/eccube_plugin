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
     *
     * @return $this
     */
    public function setDays(?int $days);

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
     *
     * @return $this
     */
    public function setTime(?int $time);
}
