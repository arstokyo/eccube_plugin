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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Day;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface for Has 受注日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasJdayInterface
{
    /**
     * Get 受注日
     *
     * @return ?AceDateTime\AceDateTimeInterface
     */
    public function getJday();

    /**
     * Set 受注日
     *
     * @param \DateTime|string|null $jday
     *
     * @return $this
     */
    public function setJday($jday);
}
