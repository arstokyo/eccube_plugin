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
 * Interface for Has 出荷予定日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasYdayInterface
{
    /**
     * Get 出荷予定日
     *
     * @return ?AceDateTime\AceDateTimeInterface
     */
    public function getYday();

    /**
     * Set 出荷予定日
     *
     * @param \DateTime|string|null $yday
     *
     * @return $this
     */
    public function setYday($yday);
}
