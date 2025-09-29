<?php

namespace Plugin\AceClient43\Bridge\DataConverter;

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
     * 注文事前作成の要件をバリデーション
     *
     * @param Shipping $shipping
     * @param Config|null $config
     *
     * @return array [order, customer, customerAddress, config]
     *
     * @throws \LogicException
     */
    public function validatePreCreate(Shipping $shipping, ?Config $config): array;

    /**
     * 配送/注文データをCreateOrderリクエストに変換
     * - AddCart相当のprmと、DecisionCartのオプション生成を内包して作成します。
     *
     * @param Shipping $shipping
     * @param Order $order
     * @param Customer $customer
     * @param CustomerAddress|null $customerAddress
     * @param Config $config
     * @param string $systemId
     * @param string $sessionId
     * @param array<string,mixed> $decisionOptions
     *
     * @return CreateOrderRequestModelInterface
     */
    public function convertToRequest(
        Shipping $shipping,
        Order $order,
        Customer $customer,
        ?CustomerAddress $customerAddress,
        Config $config,
        string $systemId,
        string $sessionId,
        array $decisionOptions = [],
    ): CreateOrderRequestModelInterface;

    /**
     * AddCart 相当のリクエストを作成（必要に応じてフリー項目も付与）
     */
    public function buildAddCartRequest(
        Shipping $shipping,
        Order $order,
        Customer $customer,
        ?CustomerAddress $customerAddress,
        Config $config,
        string $systemId,
        string $sessionId,
        array $options = [],
    ): AddCartRequestModelInterface;
}
