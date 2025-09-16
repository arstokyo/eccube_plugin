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

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\AddHanpu;

/**
 * Interface for CouponModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface CouponModelInterface
{
    /**
     * Get クーポン使用対象金額
     *
     * @return int|null
     */
    public function getCouponmoney(): ?int;

    /**
     * Set クーポン使用対象金額
     *
     * @param int|null $couponmoney
     *
     * @return $this
     */
    public function setCouponmoney(?int $couponmoney);
}
