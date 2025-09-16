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
 * Interface for Has 売上日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasUdayInterface
{
    /**
     * Get 売上日
     *
     * @return ?AceDateTime\AceDateTimeInterface
     */
    public function getUday();

    /**
     * Set 売上日
     *
     * @param \DateTime|string|null $uday
     *
     * @return $this
     */
    public function setUday($uday);
}
