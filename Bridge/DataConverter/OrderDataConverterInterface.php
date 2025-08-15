<?php

namespace Plugin\AceClient43\Bridge\DataConverter;

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Eccube\Entity\Order;
use Eccube\Entity\Shipping;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModel;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart\DecisionCartRequestModel;
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
     * 配送/注文データをAddCartリクエストに変換
     *
     * @param Shipping $shipping
     * @param Order $order
     * @param Customer $customer
     * @param CustomerAddress|null $customerAddress
     * @param Config $config
     * @param string $systemId
     * @param string $sessionId
     *
     * @return AddCartRequestModel
     */
    public function convertToAddCartRequest(
        Shipping $shipping,
        Order $order,
        Customer $customer,
        ?CustomerAddress $customerAddress,
        Config $config,
        string $systemId,
        string $sessionId,
    ): AddCartRequestModel;

    /**
     * DecisionCartリクエストに変換
     *
     * @param string $sessionId
     * @param string $systemId
     * @param array|null $returnJdKubun
     * @param array|null $returnJmKubun
     *
     * @return DecisionCartRequestModel
     */
    public function convertToDecisionCartRequest(
        string $sessionId,
        string $systemId,
        ?array $returnJdKubun = null,
        ?array $returnJmKubun = null,
    ): DecisionCartRequestModel;
}
