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
 * Class for CouponModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class CouponModel implements CouponModelInterface
{
    /** @var ?int クーポン使用対象金額 */
    protected ?int $couponmoney = null;

    /**
     * {@inheritDoc}
     */
    public function getCouponmoney(): ?int
    {
        return $this->couponmoney;
    }

    /**
     * {@inheritDoc}
     */
    public function setCouponmoney(?int $couponmoney)
    {
        $this->couponmoney = $couponmoney;

        return $this;
    }
}
