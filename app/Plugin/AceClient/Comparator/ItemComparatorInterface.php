<?php

namespace Plugin\AceClient43\Comparator;

use Eccube\Entity\CartItem;
use Eccube\Entity\OrderItem;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\JyumeiModelInterface;

/**
 * アイテム比較の契約インターフェース.
 *
 * 役割:
 * - 「商品同一性（ProductClass/外部コード）」＋「カスタム属性」の比較を一元化する。
 */
interface ItemComparatorInterface
{
    /**
     * CartItem 同士の一致比較（ProductClass → カスタム属性）.
     */
    public function compareCartItemWithCartItem(CartItem $left, CartItem $right): bool;

    /**
     * CartItem と JyumeiModel の一致比較（ProductClass → カスタム属性）.
     */
    public function compareCartItemWithJyumei(CartItem $cartItem, JyumeiModelInterface $jyumeiModel): bool;

    /**
     * CartItem と OrderItem の一致比較（ProductClass → カスタム属性）.
     */
    public function compareCartItemWithOrderItem(CartItem $cartItem, OrderItem $orderItem): bool;

    /**
     * OrderItem と JyumeiModel の一致比較（ProductClass → カスタム属性）.
     */
    public function compareOrderItemWithJyumei(OrderItem $orderItem, JyumeiModelInterface $jyumeiModel): bool;
}
