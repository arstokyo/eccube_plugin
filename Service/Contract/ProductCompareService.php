<?php

namespace Plugin\AceClient43\Service\Contract;

use Eccube\Entity\CartItem;
use Eccube\Entity\OrderItem;
use Eccube\Entity\ProductClass;

/**
 * プロダクト比較サービス（プラグイン既定実装）.
 *
 * 役割:
 * - ProductClass（商品規格）の同一性を判定する基本実装。
 * - CartItem 同士の一致は「ProductClass が同一」で判定（付帯情報は本実装では無視）。
 *
 * 備考:
 * - 付帯情報（ギフト/オーダーメイド等）まで考慮した比較が必要な場合は、Customize 側の実装で拡張/差し替え可能。
 */
class ProductCompareService implements ProductCompareInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSameProductClass(?ProductClass $pc1, ?ProductClass $pc2): bool
    {
        $id1 = $pc1 ? $pc1->getId() : null;
        $id2 = $pc2 ? $pc2->getId() : null;

        return $id1 !== null && $id2 !== null && (string) $id1 === (string) $id2;
    }

    /**
     * {@inheritdoc}
     */
    public function isSameProductClassBetweenOrderAndCart(OrderItem $orderItem, CartItem $cartItem): bool
    {
        return $this->isSameProductClass($orderItem->getProductClass(), $cartItem->getProductClass());
    }

    /**
     * {@inheritdoc}
     */
    public function isSameProductWithGcode(?ProductClass $pc, $gcode): bool
    {
        if ($pc === null || $gcode === null || $gcode === '') {
            return false;
        }
        $aceProductId = $pc->getAceProductId();

        return $aceProductId !== null && (string) $aceProductId === (string) $gcode;
    }
}
