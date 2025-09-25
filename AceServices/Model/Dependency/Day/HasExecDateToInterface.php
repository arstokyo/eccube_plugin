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
 * Interface for Has 終了日時
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasExecDateToInterface
{
    /**
     * Get 終了日時
     *
     * @return ?AceDateTime\AceDateTimeInterface
     */
    public function getExecDateTo();

    /**
     * Set 終了日時
     *
     * @param \DateTime|string|null $execDateTo
     *
     * @return $this
     */
    public function setExecDateTo($execDateTo);
}
