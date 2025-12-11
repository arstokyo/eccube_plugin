<?php

namespace Plugin\AceClient43\Converter;

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Eccube\Entity\Order;
use Eccube\Entity\Shipping;
use Eccube\Repository\DeliveryTimeRepository;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\CreateOrder\CreateOrderRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart;
use Plugin\AceClient43\Bridge\CreateRequestModelTrait;
use Plugin\AceClient43\Converter\Corrector\AddCartRequestCorrectorApplier;
use Plugin\AceClient43\Converter\Corrector\CreateOrderRequestCorrectorApplier;
use Plugin\AceClient43\Entity\Config;

class OrderDataConverter implements OrderDataConverterInterface
{
    use CreateRequestModelTrait;

    protected AddCartConverterFactory $converterFactory;
    protected DeliveryTimeRepository $deliveryTimeRepository;
    protected AddCartRequestCorrectorApplier $addCartRequestCorrectorApplier;
    protected CreateOrderRequestCorrectorApplier $createOrderRequestCorrectorApplier;

    public function __construct(
        AddCartConverterFactory $converterFactory,
        DeliveryTimeRepository $deliveryTimeRepository,
        AddCartRequestCorrectorApplier $addCartRequestCorrectorApplier,
        CreateOrderRequestCorrectorApplier $createOrderRequestCorrectorApplier,
    ) {
        $this->deliveryTimeRepository = $deliveryTimeRepository;
        $this->converterFactory = $converterFactory;
        $this->addCartRequestCorrectorApplier = $addCartRequestCorrectorApplier;
        $this->createOrderRequestCorrectorApplier = $createOrderRequestCorrectorApplier;
    }

    /**
     * 配送/注文データから CreateOrder リクエストを作成
     * - AddCart 相当の prm を作成（create_order フローで）
     * - DecisionCart 用のオプションを生成
     * - 両者を束ねた CreateOrderRequest を返却
     *
     * @param array<string,mixed> $decisionOptions
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
        array $options = [],
    ): CreateOrderRequestModelInterface {
        // 1) AddCart 相当のリクエスト（prm）を create_order フローで作成
        $addCartRequest = $this->buildAddCartRequest(
            $shipping,
            $order,
            $customer,
            $customerAddress,
            $config,
            $systemId,
            $sessionId,
            $isOrderSupportEnabled,
            AddCartFlow::createOrder(),
            $options,
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
        if ($addCartRequest->getPrm()->getOptions() !== null) {
            $opt = $addCartRequest->getPrm()->getOptions();
            if (method_exists($opt, 'setNoResponse')) {
                $opt->setNoResponse(true);
            }
        }

        $context = [
            'shipping' => $shipping,
            'order' => $order,
            'customer' => $customer,
            'customer_address' => $customerAddress,
            'decision_options' => $decisionOptions,
            'config' => $config,
        ];
        $this->createOrderRequestCorrectorApplier->apply($createOrder, $context, $options);

        return $createOrder;
    }

    /**
     * AddCart 相当のリクエストを作成（必要に応じてフリー項目も付与）
     *
     * このメソッドは複数のフローで再利用されます：
     * - OrderBridge::createAddCartRequest から呼び出し時は shopping_add_cart フロー
     * - convertToCreateOrderRequest から呼び出し時は create_order フロー
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
    ): AddCartRequestModelInterface {
        $trigger = $options['_trigger'] ?? null;

        // 指定されたフロー用の不変なコンバータを生成
        $addCartRequestConverter = $this->converterFactory->createAddCartRequestConverter($flow);
        $jyumeiDataConverter = $this->converterFactory->createJyumeiDataConverter($flow);

        $member = $addCartRequestConverter->buildMemberOrderModel($customer, $customerAddress, $options);
        $jyuden = $addCartRequestConverter->buildJyudenModel(
            $order->getAceTransactionId(),
            $isOrderSupportEnabled,
            $config,
            $options['ace_payment_id'] ?? null,
            $options
        );

        [$jyumeis, $charge, $discount, $deliveryFee] = $this->buildLines($order, $jyumeiDataConverter, $flow, $isOrderSupportEnabled, $trigger);

        // Use shared converter to apply totals
        $addCartRequestConverter->applyOrderTotals($jyuden, $charge, $discount, $deliveryFee, $config, $options);

        /** @var RequestAddCart\OrderPrmModelInterface $prm */
        /** @var RequestAddCart\DetailModelInterface $detail */
        $prm = $this->createSubModel(RequestAddCart\OrderPrmModelInterface::class);
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

        $requestModel
            ->setPrm($prm)
            ->setId($systemId)
            ->setSessId($sessionId);

        $context = [
            'shipping' => $shipping,
            'order' => $order,
            'customer' => $customer,
            'customer_address' => $customerAddress,
            'config' => $config,
        ];
        $this->addCartRequestCorrectorApplier->apply($requestModel, $flow, $context, $options);

        return $requestModel;
    }

    protected function buildLines(Order $order, JyumeiDataConverterInterface $jyumeiDataConverter, AddCartFlow $flow, bool $isOrderSupportEnabled, ?string $trigger): array
    {
        $jyumeis = [];
        $charge = 0;
        $discount = 0;
        $deliveryFee = 0;

        foreach ($order->getOrderItems() as $item) {
            if ($jyumeiDataConverter->shouldExcludeOrderItem($item, $flow, $isOrderSupportEnabled, $trigger)) {
                continue;
            }

            if ($item->isProduct()) {
                $jyumeis[] = $jyumeiDataConverter->convertOrderItemToJyumei($item);
            } elseif ($item->isCharge()) {
                $charge += $item->getPriceIncTax() * $item->getQuantity();
            } elseif ($item->isDiscount() || $item->isPoint()) {
                $discount += $item->getPriceIncTax() * $item->getQuantity();
            } elseif ($item->isDeliveryFee()) {
                $deliveryFee += $item->getPriceIncTax() * $item->getQuantity();
            }
        }

        return [$jyumeis, $charge, $discount, $deliveryFee];
    }
}
