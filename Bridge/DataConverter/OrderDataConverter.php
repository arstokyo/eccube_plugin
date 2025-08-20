<?php

namespace Plugin\AceClient43\Bridge\DataConverter;

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Eccube\Entity\Order;
use Eccube\Entity\Shipping;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\CreateOrder\CreateOrderRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart;
use Plugin\AceClient43\Bridge\CreateRequestModelTrait;
use Plugin\AceClient43\Entity\Config;

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
     * 配送/注文データから CreateOrder リクエストを作成
     * - AddCart 相当の prm を作成
     * - DecisionCart 用のオプションを生成
     * - 両者を束ねた CreateOrderRequest を返却
     *
     * @param array<string,mixed> $decisionOptions
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
    ): CreateOrderRequestModelInterface {
        // 1) AddCart 相当のリクエスト（prm）を作成
        $addCartRequest = $this->buildAddCartRequest(
            $shipping,
            $order,
            $customer,
            $customerAddress,
            $config,
            $systemId,
            $sessionId
        );

        // 2) DecisionCart 用のオプションを作成
        $optionsModel = $this->createSubModel(DecisionCart\OptionsModelInterface::class);
        if (isset($decisionOptions['returnJdKubun'])) {
            $optionsModel->setReturnJdKubun($decisionOptions['returnJdKubun']);
        }
        if (isset($decisionOptions['returnJmKubun'])) {
            $optionsModel->setReturnJmKubun($decisionOptions['returnJmKubun']);
        }

        // 3) CreateOrder リクエストを組み立て（Trait のファクトリを使用）
        /** @var CreateOrderRequestModelInterface $createOrder */
        $createOrder = $this->createRequestModel(CreateOrderRequestModelInterface::class);
        $createOrder
            ->setId($systemId)
            ->setSessId($sessionId)
            ->setPrm($addCartRequest->getPrm())
            ->setDecisionOptions($optionsModel);

        // AddCart のレスポンス省略フラグ（no_response）を、必要に応じて Options に設定する実装は
        // WebMethod 側でも補完しているため、ここでは既存の OptionsModel 実装にメソッドがあれば設定します。
        if (method_exists($addCartRequest->getPrm(), 'getOptions') && $addCartRequest->getPrm()->getOptions() !== null) {
            $opt = $addCartRequest->getPrm()->getOptions();
            if (method_exists($opt, 'setNoResponse')) {
                $opt->setNoResponse(true);
            }
        }

        return $createOrder;
    }

    /**
     * AddCart 相当のリクエストを作成（必要に応じてフリー項目も付与）
     */
    protected function buildAddCartRequest(
        Shipping $shipping,
        Order $order,
        Customer $customer,
        ?CustomerAddress $customerAddress,
        Config $config,
        string $systemId,
        string $sessionId,
    ): AddCartRequestModelInterface {
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

        /** @var RequestAddCart\OrderPrmModelInterface $prm */
        $prm = $this->createSubModel(RequestAddCart\OrderPrmModelInterface::class);
        /** @var RequestAddCart\DetailModelInterface $detail */
        $detail = $this->createSubModel(RequestAddCart\DetailModelInterface::class);
        $detail->setJyumei($jyumeis);
        /** @var RequestAddCart\MailJyudenModel $mailJyuden */
        $mailJyuden = $this->createSubModel(RequestAddCart\MailJyudenModel::class);
        $mailJyuden->setMail($order->getEmail());

        $prm
            ->setMember($member)
            ->setJyuden($jyuden)
            ->setDetail($detail)
            ->setMailjyuden($mailJyuden);

        /** @var AddCartRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(AddCartRequestModelInterface::class);

        return $requestModel
            ->setPrm($prm)
            ->setId($systemId)
            ->setSessId($sessionId);
    }

    /**
     * MemberOrderModelを作成
     */
    protected function createMemberOrderModel(Customer $customer, ?CustomerAddress $customerAddress): RequestAddCart\MemberOrderModelInterface
    {
        /** @var RequestAddCart\MemberOrderModelInterface $memberOrderModel */
        $memberOrderModel = $this->createSubModel(RequestAddCart\MemberOrderModelInterface::class);

        /** @var RequestAddCart\JmemberModel $jmember */
        $jmember = $this->createSubModel(RequestAddCart\JmemberModel::class);
        $jmember->setCode($customer->getAceCustomerId());

        /** @var RequestAddCart\SmemberModel $smember */
        $smember = $this->createSubModel(RequestAddCart\SmemberModel::class);
        $smember->setCode($customer->getAceCustomerId());

        $memberOrderModel
            ->setJmember($jmember)
            ->setSmember($smember);

        if ($customerAddress !== null) {
            /** @var RequestAddCart\NmemberModel $nmember */
            $nmember = $this->createSubModel(RequestAddCart\NmemberModel::class);
            $nmember->setEda($customerAddress->getAceEdaNo());
            $memberOrderModel->setNmember($nmember);
        }

        return $memberOrderModel;
    }

    /**
     * JyudenModelを作成
     */
    protected function createJyudenModel($order, Shipping $shipping, Config $config): RequestAddCart\JyudenModelInterface
    {
        /** @var RequestAddCart\JyudenModelInterface $jyuden */
        $jyuden = $this->createSubModel(RequestAddCart\JyudenModelInterface::class);

        return $jyuden
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
        RequestAddCart\JyudenModelInterface $jyuden,
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

        if ($config->shouldUseAceDelivery() && $deliveryFee > 0) {
            $jyuden->setSouryou($deliveryFee);
        }
    }

    /**
     * 受注フリーマップを JyudenFreeModel 配列へ変換
     *
     * @param array<int, string|int|bool|null> $freeMap [Fmkbn => value]
     *
     * @return RequestAddCart\JyudenFreeModelInterface[]
     */
    protected function buildJyudenFreeModels(array $freeMap): array
    {
        $models = [];
        foreach ($freeMap as $fmkbn => $free) {
            if ($free === null || $free === '') {
                continue;
            }
            /** @var RequestAddCart\JyudenFreeModelInterface $model */
            $model = $this->createSubModel(RequestAddCart\JyudenFreeModelInterface::class);
            $model->setFmkbn($fmkbn)
                  ->setFree((string) $free);
            $models[] = $model;
        }

        return $models;
    }
}
