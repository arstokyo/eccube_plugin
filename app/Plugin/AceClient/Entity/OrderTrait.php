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

namespace Plugin\AceClient43\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;
use Eccube\Entity\ItemInterface;
use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * @EntityExtension("Eccube\Entity\Order")
 */
trait OrderTrait
{
    use BaseCartOrderTrait;

    /**
     * @var string Aceポイント割引金額（DB decimal を文字列で保持）
     *
     * @ORM\Column(name="ace_point_discount", type="decimal", precision=12, scale=2, options={"comment":"Aceポイント割引金額","default":0})
     */
    private string $ace_point_discount = '0.00';

    public function getAcePointDiscount(): float
    {
        return (float) $this->ace_point_discount;
    }

    public function setAcePointDiscount(string $ace_point_discount): static
    {
        $nomalized = NumberConverter::normalizeFloatToString(min(0, $ace_point_discount));
        if ($this->ace_point_discount === $nomalized) {
            return $this;
        }

        $this->ace_point_discount = $nomalized;

        return $this;
    }

    public function getApplicablePromotionDiscount(): float
    {
        $subTotal = max(0, $this->calculateSubTotal());
        $nonPointDiscount = min(0, $this->calculateNonPointDiscountTotal());
        $promotionDiscount = min(0, $this->getPromotionDiscountTotal());

        // ポイント値引きは最低優先のため、クーポン適用できる分として計算します。
        return (int) max(0, floor(min($subTotal, $subTotal + $promotionDiscount - $nonPointDiscount)));
    }

    public function calculateSubTotal(): float
    {
        return $this->getItems()
            ->getProductClasses()
            ->reduce(function ($sum, ItemInterface $item) {
                $sum += $item->getPriceIncTax() * $item->getQuantity();

                return $sum;
            }, 0);
    }

    public function calculateNonPointDiscountTotal(): int
    {
        $total = 0;

        foreach ($this->getOrderItems() as $orderItem) {
            // ポイント値引きではない
            if ($orderItem->isPointDiscount()) {
                continue;
            }

            if ($orderItem->isDiscount() || $orderItem->isPoint()) {
                $total += $orderItem->getPriceIncTax() * $orderItem->getQuantity();
            }
        }

        return $total;
    }

    /**
     * 合計ポイント値引きを取得。
     *
     * Twigのヘルパーファクション
     *
     * @return float
     */
    public function getPointDiscountTotal(): float
    {
        $total = 0;

        foreach ($this->getOrderItems() as $orderItem) {
            if ($orderItem->isPointDiscount()) {
                $total += $orderItem->getPriceIncTax() * $orderItem->getQuantity();
            }
        }

        return $total;
    }

    /**
     * 合計プロモション値引きを取得。
     *
     * Twigのヘルパーファクション
     *
     * @return float
     */
    public function getPromotionDiscountTotal(): float
    {
        $total = 0;

        foreach ($this->getOrderItems() as $orderItem) {
            if ($orderItem->isPromotion()) {
                $total += $orderItem->getPriceIncTax() * $orderItem->getQuantity();
            }
        }

        return $total;
    }
}
