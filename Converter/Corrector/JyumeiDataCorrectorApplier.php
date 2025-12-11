<?php

namespace Plugin\AceClient43\Converter\Corrector;

use Eccube\Entity\CartItem;
use Eccube\Entity\OrderItem;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;
use Plugin\AceClient43\Converter\AddCartFlow;

/**
 * Jyumei明細用の補正器チェーン適用管理クラス
 */
final class JyumeiDataCorrectorApplier extends RequestCorrectorApplierAbstract
{
    /**
     * CartItem 由来の JyumeiModel に対して、全補正器を適用
     */
    public function applyForCartItem(
        CartItem $cartItem,
        RequestAddCart\JyumeiModelInterface $jyumei,
        AddCartFlow $flow,
        array $options = [],
    ): void {
        /** @var JyumeiCorrectorInterface $corrector */
        foreach ($this->correctors as $corrector) {
            if ($corrector->supports($flow, 'cart_item')) {
                $corrector->correctCartItem($cartItem, $jyumei, $flow, $options);
            }
        }
    }

    /**
     * OrderItem 由来の JyumeiModel に対して、全補正器を適用
     */
    public function applyForOrderItem(
        OrderItem $orderItem,
        RequestAddCart\JyumeiModelInterface $jyumei,
        AddCartFlow $flow,
        array $options = [],
    ): void {
        /** @var JyumeiCorrectorInterface $corrector */
        foreach ($this->correctors as $corrector) {
            if ($corrector->supports($flow, 'order_item')) {
                $corrector->correctOrderItem($orderItem, $jyumei, $flow, $options);
            }
        }
    }
}
