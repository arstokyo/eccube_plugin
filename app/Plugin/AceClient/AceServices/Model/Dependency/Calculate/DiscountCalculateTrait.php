<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Calculate;

trait DiscountCalculateTrait
{
    protected ?int $pointDicount = null;
    protected ?int $promotionDiscount = null;
    protected ?int $promotionDiscountExcludedTax = null;
    protected ?int $pointDicountExcludedTax = null;

    public function getPromotionDiscount(): ?int
    {
        if (null !== $this->promotionDiscount) {
            return $this->promotionDiscount;
        }

        if (null === $this->getJyuden()) {
            return null;
        }

        $promotionDiscountGcode = $this->getPromotionDiscountGcode();
        if (null !== $promotionDiscountGcode) {
            $jyumeiList = $this->getJyumei() ?? [];

            $discount = 0.0;
            foreach ($jyumeiList as $jyumei) {
                // 値引きで、かつ、対象の商品コードと一致する場合
                if ($jyumei->isDiscount() && $promotionDiscountGcode === $jyumei->getGcode()) {
                    // 税込の価格を採用。
                    // 変更したい場合はカスタマイズのOrderModelを継承してください。
                    $discount += (float) $jyumei->getTinmoney();
                }
            }
            $this->promotionDiscount = (int) min($discount, 0.0);
        } else {
            $pointDiscount = (float) $this->getPointDiscount();
            $allDiscount = (float) $this->getJyuden()->getNebiki();
            $this->promotionDiscount = (int) min($allDiscount - $pointDiscount, 0.0);
        }

        return (int) $this->promotionDiscount;
    }

    public function getPromotionDiscountExcludedTax(): ?int
    {
        if (null !== $this->promotionDiscountExcludedTax) {
            return $this->promotionDiscountExcludedTax;
        }

        if (null === $this->getJyuden()) {
            return null;
        }

        $promotionDiscountGcode = $this->getPromotionDiscountGcode();
        if (null !== $promotionDiscountGcode) {
            $jyumeiList = $this->getJyumei() ?? [];

            $discount = 0.0;
            foreach ($jyumeiList as $jyumei) {
                // 値引きで、かつ、対象の商品コードと一致する場合
                if ($jyumei->isDiscount() && $promotionDiscountGcode === $jyumei->getGcode()) {
                    // 税抜の価格を採用。
                    // 変更したい場合はカスタマイズのOrderModelを継承してください。
                    $discount += (float) $jyumei->getToutmoney();
                }
            }
            $this->promotionDiscountExcludedTax = (int) min($discount, 0.0);
        } else {
            $pointDiscount = (float) $this->getPointDiscountExcludedTax();
            $allDiscount = (float) $this->getJyuden()->getNebikizn();
            $this->promotionDiscountExcludedTax = (int) min($allDiscount - $pointDiscount, 0.0);
        }

        return (int) $this->promotionDiscountExcludedTax;
    }

    protected function getPromotionDiscountGcode(): ?string
    {
        return null;
    }

    public function getPointDiscount(): ?int
    {
        if (null !== $this->pointDicount) {
            return $this->pointDicount;
        }

        if (null === $this->getJyuden()) {
            return null;
        }

        $pointDiscountGcode = $this->getPointDiscountGcode();
        $jyumeiList = $this->getJyumei() ?? [];
        if (null === $pointDiscountGcode || empty($jyumeiList)) {
            return null;
        }

        $discount = 0.0;
        foreach ($jyumeiList as $jyumei) {
            // 値引きで、かつ、対象の商品コードと一致する場合
            if ($jyumei->isDiscount() && $jyumei->getGcode() === $pointDiscountGcode) {
                // 税込の合計価格を採用。
                // 変更したい場合はカスタマイズのOrderModelを継承してください。
                $discount += (float) $jyumei->getTinmoney();
            }
        }

        $this->pointDicount = (int) min($discount, 0.0);

        return $this->pointDicount;
    }

    public function getPointDiscountExcludedTax(): ?int
    {
        if (null !== $this->pointDicountExcludedTax) {
            return $this->pointDicountExcludedTax;
        }

        if (null === $this->getJyuden()) {
            return null;
        }

        $pointDiscountGcode = $this->getPointDiscountGcode();
        $jyumeiList = $this->getJyumei() ?? [];
        if (null === $pointDiscountGcode || empty($jyumeiList)) {
            return null;
        }

        $discount = 0.0;
        foreach ($jyumeiList as $jyumei) {
            // 値引きで、かつ、対象の商品コードと一致する場合
            if ($jyumei->isDiscount() && $jyumei->getGcode() === $pointDiscountGcode) {
                // 税抜の合計価格を採用。
                // 変更したい場合はカスタマイズのOrderModelを継承してください。
                $discount += (float) $jyumei->getToutmoney();
            }
        }

        $this->pointDicountExcludedTax = (int) min($discount, 0.0);

        return $this->pointDicountExcludedTax;
    }

    protected function getPointDiscountGcode(): ?string
    {
        return null;
    }
}
