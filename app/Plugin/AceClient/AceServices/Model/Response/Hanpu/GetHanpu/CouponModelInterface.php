<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\GetHanpu;

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
     * @return $this
     */
    public function setCouponmoney(int|null $couponmoney): static;
}