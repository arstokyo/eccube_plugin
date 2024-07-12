<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\AddHanpu;

/**
 * Class for CouponModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class CouponModel implements CouponModelInterface
{
    /** @var ?int $couponmoney クーポン使用対象金額 */
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