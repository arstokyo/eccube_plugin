<?php

namespace Plugin\AceClient43\Converter;

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Eccube\Entity\Order;
use Eccube\Entity\Shipping;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\CreateOrder\CreateOrderRequestModelInterface;
use Plugin\AceClient43\Entity\Config;

interface OrderDataConverterInterface
{
    /**
     * 配送/注文データからCreateOrderリクエストを作成
     * - AddCart相当のprmと、DecisionCartのオプション生成を内包して作成します。
     *
     * @param Shipping $shipping
     * @param Order $order
     * @param Customer $customer
     * @param CustomerAddress|null $customerAddress
     * @param Config $config
     * @param string $systemId
     * @param string $sessionId
     * @param bool $isOrderSupportEnabled
     * @param array<string,mixed> $decisionOptions
     *
     * @return CreateOrderRequestModelInterface
     */
    public function convertToCreateOrderRequest(
        Shipping $shipping,
        Order $order,
        Customer $customer,
        ?CustomerAddress $customerAddress,
        Config $config,
        string $systemId,
        string $sessionId,
        bool $isOrderSupportEnabled,
        array $decisionOptions = [],
    ): CreateOrderRequestModelInterface;

    /**
     * AddCart 相当のリクエストを作成（必要に応じてフリー項目も付与）
     *
     * このメソッドは複数のフローで再利用されます：
     * - OrderBridge::createAddCartRequest (shopping_add_cart フロー)
     * - OrderBridge::create -> convertToCreateOrderRequest (create_order フロー)
     *
     * @param Shipping $shipping
     * @param Order $order
     * @param Customer $customer
     * @param CustomerAddress|null $customerAddress
     * @param Config $config
     * @param string $systemId
     * @param string $sessionId
     * @param AddCartFlow $flow 呼び出し元のフロー（shopping_add_cart または create_order）
     * @param bool $isOrderSupportEnabled
     * @param array $options
     *
     * @return AddCartRequestModelInterface
     */
    public function buildAddCartRequest(
        Shipping $shipping,
        Order $order,
        Customer $customer,
        ?CustomerAddress $customerAddress,
        Config $config,
        string $systemId,
        string $sessionId,
        bool $isOrderSupportEnabled,
        AddCartFlow $flow,
        array $options = [],
    ): AddCartRequestModelInterface;
}
