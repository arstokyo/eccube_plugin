<?php

namespace Plugin\AceClient43\Converter;

use Eccube\Entity\CartItem;
use Eccube\Entity\OrderItem;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;

interface JyumeiDataConverterInterface
{
    /**
     * フローを設定
     *
     * @param AddCartFlow $flow
     *
     * @return self
     */
    public function setFlow(AddCartFlow $flow): self;

    /**
     * 現在のフローを取得
     *
     * @return AddCartFlow|null
     */
    public function getFlow(): ?AddCartFlow;

    /**
     * CartItem を JyumeiModel に変換
     *
     * @param CartItem $item
     * @param array $options
     *
     * @return RequestAddCart\JyumeiModelInterface
     */
    public function convertCartItemToJyumei(CartItem $item, array $options = []): RequestAddCart\JyumeiModelInterface;

    /**
     * OrderItem を JyumeiModel に変換
     *
     * @param OrderItem $item
     * @param array $options
     *
     * @return RequestAddCart\JyumeiModelInterface
     */
    public function convertOrderItemToJyumei(OrderItem $item, array $options = []): RequestAddCart\JyumeiModelInterface;

    /**
     * リクエストの受注明細を作成する際に、無視するか
     */
    public function shouldExcludeOrderItem(OrderItem $orderItem, AddCartFlow $flow, bool $isOrderSupportEnabled, array $options): bool;

    /**
     * リクエストのカート明細を作成する際に、無視するか
     */
    public function shouldExcludeCartItem(CartItem $cartItem, AddCartFlow $flow, bool $isOrderSupportEnabled, array $options): bool;
}
