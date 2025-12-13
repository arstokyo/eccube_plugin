<?php

namespace Plugin\AceClient43\Comparator;

use Eccube\Entity\CartItem;
use Eccube\Entity\OrderItem;
use Eccube\Entity\ProductClass;

/**
 * プロダクト比較の契約インターフェース.
 *
 * 責務:
 * - ProductClass（商品規格）同士の同一性判定
 * - 外部コード(gcode)との一致判定
 * - OrderItem と CartItem の ProductClass 同一性判定
 *
 * 注意:
 * - CartItem 同士の比較は ItemCompareInterface で行います（本IFからは削除）。
 */
interface ProductComparatorInterface
{
    /**
     * 2つの ProductClass が同一かを判定する.
     */
    public function isSameProductClass(?ProductClass $pc1, ?ProductClass $pc2): bool;

    /**
     * OrderItem と CartItem が同一商品(ProductClass)かを判定するヘルパー.
     */
    public function isSameProductClassBetweenOrderAndCart(OrderItem $orderItem, CartItem $cartItem): bool;

    /**
     * ProductClass の外部コード(AceProductId) と外部 gcode(通販Ace) の一致を判定する.
     *
     * @param ProductClass|null $pc   比較対象の ProductClass
     * @param string|int|null   $gcode 外部コード（通販Ace gcode）
     */
    public function isSameProductWithGcode(?ProductClass $pc, $gcode): bool;
}
