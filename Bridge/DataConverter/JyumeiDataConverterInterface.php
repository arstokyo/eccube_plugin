<?php

namespace Plugin\AceClient43\Bridge\DataConverter;

use Eccube\Entity\CartItem;
use Eccube\Entity\OrderItem;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;

interface JyumeiDataConverterInterface
{
    /**
     * Convert CartItem to JyumeiModel
     *
     * @param CartItem $item
     * @param array $options
     *
     * @return RequestAddCart\JyumeiModelInterface
     */
    public function convertCartItemToJyumei(CartItem $item, array $options = []): RequestAddCart\JyumeiModelInterface;

    /**
     * Convert OrderItem to JyumeiModel
     *
     * @param OrderItem $item
     * @param array $options
     *
     * @return RequestAddCart\JyumeiModelInterface
     */
    public function convertOrderItemToJyumei(OrderItem $item, array $options = []): RequestAddCart\JyumeiModelInterface;
}
