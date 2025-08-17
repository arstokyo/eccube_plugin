<?php

namespace Plugin\AceClient43\Bridge\DataConverter;

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Eccube\Entity\Order;
use Eccube\Entity\Shipping;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModel;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\JyudenFreeModel;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart\DecisionCartRequestModel;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart\DecisionCartRequestModelInterface;
use Plugin\AceClient43\Bridge\CreateRequestModelTrait;
use Plugin\AceClient43\Entity\Config;
use Plugin\AceClient43\Entity\OrderTrait;

class OrderDataConverter implements OrderDataConverterInterface
{
    use CreateRequestModelTrait;

    protected JyumeiDataConverterInterface $jyumeiDataConverter;

    public function __construct(JyumeiDataConverterInterface $jyumeiDataConverter)
    {
        $this->jyumeiDataConverter = $jyumeiDataConverter;
    }

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

        // 支払方法のACE決済IDを検証（Pcodeに相当）
        $payment = $order->getPayment();
        if ($payment === null || $payment->getAcePaymentId() === null) {
            throw new \LogicException('支払方法にACE決済IDが設定されていません。管理画面で支払方法にACE決済IDを設定してください。');
        }

        return [$order, $customer, $customerAddress, $config];
    }

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
    ): AddCartRequestModel {
        $member = $this->createMemberOrderModel($customer, $customerAddress);
        $jyuden = $this->createJyudenModel($order, $shipping, $config);

        $jyumeis = [];
        $charge = 0;
        $discount = 0;
        $deliveryFee = 0;

        foreach ($order->getOrderItems() as $item) {
            if ($item->isCharge()) {
                $charge += $item->getPriceIncTax();
            } elseif ($item->isDiscount() || $item->isPoint()) {
                $discount += $item->getPriceIncTax();
            } elseif ($item->isDeliveryFee()) {
                $deliveryFee += $item->getPriceIncTax();
            } elseif ($item->isProduct()) {
                $jyumeis[] = $this->jyumeiDataConverter->convertOrderItemToJyumei($item);
            }
        }

        $this->applyOrderTotals($jyuden, $charge, $discount, $deliveryFee, $config);

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
    ): DecisionCartRequestModel {
        $optionsModel = $this->createSubModel(DecisionCart\OptionsModelInterface::class);
        $optionsModel->setReturnJdKubun($returnJdKubun)
            ->setReturnJmKubun($returnJmKubun);

        $idPrmModel = $this->createSubModel(DecisionCart\IdPrmModelInterface::class);
        $idPrmModel->setSyid($systemId)
            ->setOptions($optionsModel);

        /** @var DecisionCartRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(DecisionCartRequestModelInterface::class);
        $requestModel->setIdPrm($idPrmModel)
            ->setSessId($sessionId);

        return $requestModel;
    }

    /**
     * MemberOrderModelを作成
     *
     * @param Customer $customer
     * @param CustomerAddress|null $customerAddress
     *
     * @return RequestAddCart\MemberOrderModel
     */
    protected function createMemberOrderModel(Customer $customer, ?CustomerAddress $customerAddress): RequestAddCart\MemberOrderModel
    {
        $memberOrderModel = (new RequestAddCart\MemberOrderModel())
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
    protected function createJyudenModel($order, Shipping $shipping, Config $config): RequestAddCart\JyudenModel
    {
        return (new RequestAddCart\JyudenModel())
            ->setTorikbn($order->getAceTransactionId())
            ->setJcode($config->getOrderRouteId())
            ->setNbikou1($shipping->getNote())
            ->setHday($shipping->getShippingDeliveryDate())
            ->setWeborderno($order->getId())
            ->setPcode($order->getPayment()->getAcePaymentId())
            ->setPointm($order->getUsePoint());
    }

    /**
     * 注文合計をJyudenModelに適用
     *
     * @param RequestAddCart\JyudenModel $jyuden
     * @param float $charge
     * @param float $discount
     * @param float $deliveryFee
     * @param Config $config
     */
    protected function applyOrderTotals(
        RequestAddCart\JyudenModel $jyuden,
        float $charge,
        float $discount,
        float $deliveryFee,
        Config $config,
    ): void {
        if ($charge > 0) {
            $jyuden->setTesuu($charge);
        }

        if ($discount < 0) {
            $jyuden->setNebiki($discount);
        }

        if (!$config->shouldUseAceDelivery() && $deliveryFee > 0) {
            $jyuden->setSouryou($deliveryFee);
        }
    }

    /**
     * 受注フリーマップを JyudenFreeModel 配列へ変換
     *
     * @param array<int, string|int|bool|null> $freeMap [Fmkbn => value]
     *
     * @return JyudenFreeModel[]
     */
    protected function buildJyudenFreeModels(array $freeMap): array
    {
        $models = [];
        foreach ($freeMap as $fmkbn => $free) {
            if ($free === null || $free === '') {
                continue;
            }
            $model = new JyudenFreeModel();
            $model->setFmkbn($fmkbn)
                  ->setFree((string) $free);
            $models[] = $model;
        }

        return $models;
    }
}
