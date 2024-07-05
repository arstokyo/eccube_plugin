<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\AddHanpuNext;

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
    public function setCouponmoney(int|null $couponmoney): static
    {
        $this->couponmoney = $couponmoney;
        return $this;
    }
}