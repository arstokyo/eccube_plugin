<?php

namespace Plugin\AceClient43\Comparator;

use Eccube\Entity\CartItem;
use Eccube\Entity\OrderItem;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\JyumeiModelInterface;

/**
 * アイテム比較サービス（プラグイン既定実装）.
 *
 * 方針:
 * - プラグイン側では ProductClass/外部コード等の「商品同一性」のみを比較対象とし、
 *   カスタム属性は扱わない（Customize 側で拡張）。
 */
final class ItemComparatorService implements ItemComparatorInterface
{
    private ProductComparatorInterface $productComparator;

    public function __construct(ProductComparatorInterface $productComparator)
    {
        $this->productComparator = $productComparator;
    }

    public function compareCartItemWithCartItem(CartItem $left, CartItem $right): bool
    {
        return $this->productComparator->isSameProductClass($left->getProductClass(), $right->getProductClass());
    }

    public function compareCartItemWithJyumei(CartItem $cartItem, JyumeiModelInterface $jyumeiModel): bool
    {
        $pc = $cartItem->getProductClass();

        return $this->productComparator->isSameProductWithGcode($pc, $jyumeiModel->getGcode());
    }

    public function compareCartItemWithOrderItem(CartItem $cartItem, OrderItem $orderItem): bool
    {
        return $this->productComparator->isSameProductClassBetweenOrderAndCart($orderItem, $cartItem);
    }

    public function compareOrderItemWithJyumei(OrderItem $orderItem, JyumeiModelInterface $jyumeiModel): bool
    {
        $pc = $orderItem->getProductClass();

        return $this->productComparator->isSameProductWithGcode($pc, $jyumeiModel->getGcode());
    }
}
