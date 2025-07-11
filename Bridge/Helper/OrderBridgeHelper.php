<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\Bridge\Helper;

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Eccube\Entity\Master\TaxType;
use Eccube\Entity\Order;
use Eccube\Entity\OrderItem;
use Eccube\Entity\ProductClass;
use Eccube\Entity\Shipping;
use Plugin\AceClient43\AceServices\AceMethod\Jyuden\AddCartMethod;
use Plugin\AceClient43\AceServices\AceMethod\Jyuden\DecisionCartMethod;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModel;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\JyumeiModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\MemberOrderModel;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart\DecisionCartRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\AddCartResponseModelInterface;
use Plugin\AceClient43\Bridge\CreateRequestModelTrait;
use Plugin\AceClient43\Entity\Config;
use Plugin\AceClient43\Entity\Constants\AceTaxType;
use Plugin\AceClient43\Entity\OrderTrait;
use Plugin\AceClient43\Entity\ProductClassTrait;

/**
 * OrderBridgeHelper - 注文関連の複雑なロジックをカプセル化するヘルパークラス
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class OrderBridgeHelper
{
    use CreateRequestModelTrait;

    private AddCartMethod $addCartMethod;

    private DecisionCartMethod $decisionCartMethod;

    public function __construct(
        AddCartMethod $addCartMethod,
        DecisionCartMethod $decisionCartMethod,
    ) {
        $this->addCartMethod = $addCartMethod;
        $this->decisionCartMethod = $decisionCartMethod;
    }

    /**
     * 事前作成のバリデーション
     *
     * @param Shipping $shipping
     * @param Config|null $config
     *
     * @return array [order, customer, customerAddress, config]
     *
     * @throws \LogicException
     */
    public function validatePreCreate(Shipping $shipping, ?Config $config): array
    {
        $order = $shipping->getOrder();
        $customer = $order->getCustomer();
        $customerAddress = $shipping->getCustomerAddress();

        if (null === $config) {
            throw new \LogicException('AceClientプラグインの設定を先に行ってください。');
        }

        if (null === $customer->getAceCustomerId()) {
            throw new \LogicException('会員IDが設定されていません。');
        }

        return [$order, $customer, $customerAddress, $config];
    }

    /**
     * 事前作成リクエストの作成
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
    public function createPreCreateRequest(
        Shipping $shipping,
        Order $order,
        Customer $customer,
        ?CustomerAddress $customerAddress,
        Config $config,
        string $systemId,
        string $sessionId,
    ): AddCartRequestModel {
        $member = $this->createMemberOrderModel($customer, $customerAddress);
        $jyuden = $this->createJyudenModel($order, $shipping, $config);

        $jyumeis = [];
        $charge = 0;
        $discount = 0;
        $deliveryFree = 0;

        foreach ($order->getOrderItems() as $item) {
            if ($item->isCharge()) {
                $charge += $item->getPriceIncTax();
            }

            if ($item->isDiscount()) {
                $discount += $item->getPriceIncTax();
            }

            if ($item->isDeliveryFee()) {
                $deliveryFree += $item->getPriceIncTax();
            }

            if ($item->isProduct()) {
                $jyumeis[] = $this->createJyumei($item);
            }
        }

        $this->applyOrderTotals($jyuden, $charge, $discount, $deliveryFree, $config);

        $prm = (new RequestAddCart\OrderPrmModel())
            ->setMember($member)
            ->setJyuden($jyuden)
            ->setDetail((new RequestAddCart\DetailModel())
                ->setJyumei($jyumeis)
            )->setMailjyuden((new RequestAddCart\MailJyudenModel())
                ->setMail($order->getEmail())
            );

        /** @var RequestAddCart\AddCartRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(RequestAddCart\AddCartRequestModelInterface::class);

        return $requestModel
            ->setPrm($prm)
            ->setId($systemId)
            ->setSessId($sessionId);
    }

    /**
     * MemberOrderModelを作成
     *
     * @param Customer $customer
     * @param CustomerAddress|null $customerAddress
     *
     * @return MemberOrderModel
     */
    private function createMemberOrderModel(Customer $customer, ?CustomerAddress $customerAddress): MemberOrderModel
    {
        $memberOrderModel = (new MemberOrderModel())
            ->setJmember((new RequestAddCart\JmemberModel())->setCode($customer->getAceCustomerId()))
            ->setSmember((new RequestAddCart\SmemberModel())->setCode($customer->getAceCustomerId()));

        if ($customerAddress !== null) {
            $memberOrderModel->setNmember((new RequestAddCart\NmemberModel())->setEda($customerAddress->getAceEdaNo()));
        }

        return $memberOrderModel;
    }

    /**
     * JyudenModelを作成
     *
     * @param Order|OrderTrait $order
     * @param Shipping $shipping
     * @param Config $config
     *
     * @return RequestAddCart\JyudenModel
     */
    private function createJyudenModel($order, Shipping $shipping, Config $config): RequestAddCart\JyudenModel
    {
        return (new RequestAddCart\JyudenModel())
            ->setTorikbn($order->getAceTransactionId())
            ->setPcode($order->getAcePaymentId())
            ->setJcode($config->getOrderRouteId())
            ->setNbikou1($shipping->getNote())
            ->setHday($shipping->getShippingDeliveryDate())
            ->setWeborderno($order->getId())
            ->setPointm($order->getUsePoint());
    }

    /**
     * JyumeiModelを作成
     *
     * @param OrderItem $item
     *
     * @return JyumeiModelInterface
     */
    public function createJyumei(OrderItem $item): JyumeiModelInterface
    {
        /** @var ProductClass|ProductClassTrait $productClass */
        $productClass = $item->getProductClass();

        $taxKbn = $this->determineTaxType($item->getTaxType()->getId());
        $price = $taxKbn === AceTaxType::TAX_EXCLUDED
            ? $item->getPrice()
            : $item->getPriceIncTax();

        return (new RequestAddCart\JyumeiModel())
            ->setGcode($productClass->getAceProductId())
            ->setSuu($item->getQuantity())
            ->setTanka($price)
            ->setIgnorezaiko($item->isAceIgnoreStock())
            ->setRitu($item->getAceMarkupRate());
    }

    /**
     * 税区分を判定
     *
     * @param int $taxType
     *
     * @return int
     */
    private function determineTaxType(int $taxType): int
    {
        switch ($taxType) {
            case TaxType::TAXATION:
                return AceTaxType::TAX_INCLUDED;
            case TaxType::TAX_EXEMPT:
                return AceTaxType::TAX_EXEMPT;
            default:
                return AceTaxType::TAX_EXCLUDED;
        }
    }

    /**
     * 注文の合計を適用
     *
     * @param RequestAddCart\JyudenModel $jyuden
     * @param float $charge
     * @param float $discount
     * @param float $deliveryFree
     * @param Config $config
     */
    private function applyOrderTotals(
        RequestAddCart\JyudenModel $jyuden,
        float $charge,
        float $discount,
        float $deliveryFree,
        Config $config,
    ): void {
        if ($charge > 0) {
            $jyuden->setTesuu($charge);
        }

        if ($discount > 0) {
            $jyuden->setNebiki($discount);
        }

        if (!$config->shouldUseAceDelivery() && $deliveryFree > 0) {
            $jyuden->setSouryou($deliveryFree);
        }
    }

    /**
     * カートを確定するリクエストモデルを作成
     *
     * @param string $sessionId
     * @param string $systemId
     *
     * @return DecisionCartRequestModel
     */
    public function createDecisionCartRequest(string $sessionId, string $systemId, ?array $returnJdKubun = null, ?array $returnJmKubun = null): DecisionCartRequestModel
    {
        return (new DecisionCartRequestModel())
            ->setIdPrm((new DecisionCart\IdPrmModel())
                ->setSyid($systemId)
                ->setOptions((new DecisionCart\OptionsModel())
                    ->setReturnJdKubun($returnJdKubun)
                    ->setReturnJmKubun($returnJmKubun)
                )
            )
            ->setSessId($sessionId);
    }

    /**
     * AddCartメソッドを実行
     *
     * @param AddCartRequestModel $request
     *
     * @return AddCartResponseModelInterface
     */
    public function executeAddCartMethod(AddCartRequestModel $request): AddCartResponseModelInterface
    {
        $response = $this->addCartMethod
            ->withRequest($request)
            ->send();

        if (!$response->isOk()) {
            throw new \RuntimeException(sprintf('通販Aceの注文事前作成処理に失敗しました: %s', $response->getStatusCode()));
        }

        return $response->getResponse();
    }

    /**
     * DecisionCartメソッドを実行
     *
     * @param DecisionCartRequestModel $request
     *
     * @return mixed
     */
    public function executeDecisionCartMethod(DecisionCartRequestModel $request)
    {
        $response = $this->decisionCartMethod
            ->withRequest($request)
            ->send();

        if (!$response->isOk()) {
            throw new \RuntimeException(sprintf('通販Aceの注文作成処理に失敗しました: %s', $response->getStatusCode()));
        }

        return $response->getResponse();
    }
}
