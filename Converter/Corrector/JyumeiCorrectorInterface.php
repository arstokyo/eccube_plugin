<?php

namespace Plugin\AceClient43\Converter\Corrector;

use Eccube\Entity\CartItem;
use Eccube\Entity\OrderItem;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;
use Plugin\AceClient43\Converter\AddCartFlow;

/**
 * Jyumeiデータ（明細）用の補正器インターフェース
 *
 * AddCartの各フローの最終段で、CartItem/OrderItem 由来の JyumeiModel を補正します。
 */
interface JyumeiCorrectorInterface
{
    /**
     * この補正器が指定されたフロー/ソースをサポートするか
     *
     * @param AddCartFlow $flow 現在のフロー
     * @param string $source 'cart_item' | 'order_item'
     */
    public function supports(AddCartFlow $flow, string $source): bool;

    /**
     * CartItem 由来の JyumeiModel を補正
     */
    public function correctCartItem(
        CartItem $cartItem,
        RequestAddCart\JyumeiModelInterface $jyumei,
        AddCartFlow $flow,
        array $options = [],
    ): void;

    /**
     * OrderItem 由来の JyumeiModel を補正
     */
    public function correctOrderItem(
        OrderItem $orderItem,
        RequestAddCart\JyumeiModelInterface $jyumei,
        AddCartFlow $flow,
        array $options = [],
    ): void;
}
