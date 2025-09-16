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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Free;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime\AceDateTimeInterface;

/**
 * Interface For 3つフリー日付
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasThreeFdayInterface
{
    /**
     * Get フリー日付1
     *
     * @return AceDateTimeInterface|null
     */
    public function getFday1();

    /**
     * Set フリー日付1
     *
     * @param \DateTime|string|null $fday
     *
     * @return $this
     */
    public function setFday1($fday);

    /**
     * Get フリー日付2
     *
     * @return AceDateTimeInterface|null
     */
    public function getFday2();

    /**
     * Set フリー日付2
     *
     * @param \DateTime|string|null $fday2
     *
     * @return $this
     */
    public function setFday2($fday2);

    /**
     * Get フリー日付3
     *
     * @return AceDateTimeInterface|null
     */
    public function getFday3();

    /**
     * Set フリー日付3
     *
     * @param \DateTime|string|null $fday3
     *
     * @return $this
     */
    public function setFday3($fday3);
}
