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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetDurationOrderTotal;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface GetDurationOrderTotalRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetDurationOrderTotalRequestModelInterface extends RequestModelInterface, NoCategory\HasSyidInterface, NoCategory\HasMbidInterface
{
    /**
     * Get 開始日付
     *
     * @return ?int
     */
    public function getDayfrom(): ?int;

    /**
     * Set 開始日付
     *
     * @param ?int $dayfrom
     *
     * @return $this
     */
    public function setDayfrom(?int $dayfrom);

    /**
     * Get 終了日付
     *
     * @return ?int
     */
    public function getDayto(): ?int;

    /**
     * Set 終了日付
     *
     * @param ?int $dayto
     *
     * @return $this
     */
    public function setDayto(?int $dayto);
}
