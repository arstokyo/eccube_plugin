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
 * Interface for Has 開始日時
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasExecDateFromInterface
{
    /**
     * Get 開始日時
     *
     * @return ?AceDateTime\AceDateTimeInterface
     */
    public function getExecDateFrom();

    /**
     * Set 開始日時
     *
     * @param \DateTime|string|null $execDateFrom
     *
     * @return $this
     */
    public function setExecDateFrom($execDateFrom);
}
