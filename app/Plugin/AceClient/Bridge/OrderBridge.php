<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 */

namespace Plugin\AceClient43\Bridge;

use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Eccube\Common\EccubeConfig;
use Eccube\Entity\CustomerAddress;
use Eccube\Entity\Shipping;
use Eccube\Service\CartService;
use Eccube\Service\PurchaseFlow\PurchaseFlow;
use Eccube\Service\PurchaseFlow\PurchaseFlowResult;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\AceServices\AceMethod\Jyuden\AddCartMethod;
use Plugin\AceClient43\AceServices\AceMethod\Jyuden\CreateOrderMethod;
use Plugin\AceClient43\AceServices\AceMethod\Jyuden\DecisionCartMethod;
use Plugin\AceClient43\AceServices\AceMethod\WebApi\Order\V1GetAceOrderIdMethod;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\OptionsModel;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\CreateOrder\CreateOrderRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\AddCartResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\CreateOrder\CreateOrderResponseModelInterface;
use Plugin\AceClient43\Converter\AddCartFlow;
use Plugin\AceClient43\Converter\OrderDataConverterInterface;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\OnPreCreateOrderEvent;
use Plugin\AceClient43\Events\PostCreateOrderEvent;
use Plugin\AceClient43\Exception\CouldNotAddCartException;
use Plugin\AceClient43\Exception\CouldNotCreateOrderException;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\Processor\Context\UpdateEarnablePointPurchaseContext;
use Plugin\AceClient43\Processor\DeliveryFeeProcessor;
use Plugin\AceClient43\Synchronizer\AceCartResponseToOrderSynchronizerInterface;
use Plugin\AceClient43\Synchronizer\CartOrderSynchronizerInterface;
use Plugin\AceClient43\Traits\GetUserTrait;
use Plugin\AceClient43\Traits\ShoppingPurchaseFlowTrait;
use Symfony\Component\HttpFoundation\Response;

/**
 * 注文関連の処理を行うブリッジクラス
 *
 * - 既存の2段階処理（AddCart -> DecisionCart）を保持
 * - 統合API（CreateOrder）による1回呼び出しの新処理も提供
 */
class OrderBridge extends BaseBridge
{
    use CreateRequestModelTrait;
    use GetUserTrait;
    use ShoppingPurchaseFlowTrait;

    public const SYNC_DELIVERY_FEE_TRIGGER = OrderBridge::class.'::syncDeliveryFee';
    public const SYNC_EARNABLE_POINT_TRIGGER = OrderBridge::class.'::syncEarnablePoint';
    public const SYNC_SHIPPING_TRIGGER = OrderBridge::class.'::syncShipping';

    protected OrderDataConverterInterface $orderDataConverter;

    protected AddCartMethod $addCartMethod;

    protected DecisionCartMethod $decisionCartMethod;

    /** @var CreateOrderMethod 統合API用メソッド */
    protected CreateOrderMethod $createOrderMethod;

    protected CartBridge $cartBridge;

    protected DeliveryFeeProcessor $deliveryFeeProcessor;

    protected PurchaseFlow $purchaseFlow;

    protected CartOrderSynchronizerInterface $cartOrderSynchronizer;

    protected CartService $cartService;
    protected UpdateEarnablePointPurchaseContext $updateEarnablePointPurchaseContext;

    protected AceCartResponseToOrderSynchronizerInterface $cartResponseToOrderSynchronizer;

    protected V1GetAceOrderIdMethod $getAceOrderIdMethod;

    protected EccubeConfig $eccubeConfig;

    public function __construct(
        PurchaseFlow $purchaseFlow,
        OrderDataConverterInterface $orderDataConverter,
        AddCartMethod $addCartMethod,
        DecisionCartMethod $decisionCartMethod,
        CreateOrderMethod $createOrderMethod,
        CartBridge $cartBridge,
        DeliveryFeeProcessor $deliveryFeeProcessor,
        CartOrderSynchronizerInterface $cartOrderSynchronizer,
        AceCartResponseToOrderSynchronizerInterface $cartResponseToOrderSynchronizer,
        CartService $cartService,
        UpdateEarnablePointPurchaseContext $updateEarnablePointPurchaseContext,
        V1GetAceOrderIdMethod $getAceOrderIdMethod,
        EccubeConfig $eccubeConfig,
    ) {
        $this->orderDataConverter = $orderDataConverter;
        $this->addCartMethod = $addCartMethod;
        $this->decisionCartMethod = $decisionCartMethod;
        $this->createOrderMethod = $createOrderMethod;
        $this->cartBridge = $cartBridge;
        $this->deliveryFeeProcessor = $deliveryFeeProcessor;
        $this->purchaseFlow = $purchaseFlow;
        $this->cartService = $cartService;
        $this->cartOrderSynchronizer = $cartOrderSynchronizer;
        $this->cartResponseToOrderSynchronizer = $cartResponseToOrderSynchronizer;
        $this->updateEarnablePointPurchaseContext = $updateEarnablePointPurchaseContext;
        $this->getAceOrderIdMethod = $getAceOrderIdMethod;
        $this->eccubeConfig = $eccubeConfig;
    }

    /**
     * 統合API（CreateOrder）で注文を作成します。
     *
     * - AddCart 相当の prm はコンバータで生成したものを流用
     * - DecisionCart のオプションは既存の OptionsModel（DecisionCart 用）をそのまま利用
     * - OnCreateOrder イベントは廃止、OnPreCreate/POST_CREATE のみ発火
     *
     * @param Shipping $shipping
     * @param array $decisionOptions DecisionCart 用オプション（例: ['returnJdKubun' => [100001], 'returnJmKubun' => [200001]]）
     * @param bool $shouldFlush
     * @param array $options 任意の追加オプション（イベントリスナ用）
     *
     * @throws CouldNotCreateOrderException
     */
    public function create(Shipping $shipping, array $decisionOptions = [], bool $shouldFlush = false, array $options = []): void
    {
        try {
            // 受注明細や顧客情報の妥当性をチェック（AddCart 前提と同一）
            [$order, $customer, $customerAddress, $config] = $this->validatePreCreate($shipping);

            $sessionId = $this->session->getId();

            // 統合リクエストをコンバータで生成（prm と Decision オプションの両方を内包）
            /** @var CreateOrderRequestModelInterface $createOrderReq */
            $createOrderReq = $this->orderDataConverter->convertToCreateOrderRequest(
                $shipping,
                $order,
                $customer,
                $customerAddress,
                $config,
                $this->getSyid(),
                $sessionId,
                $this->aceConfigService->shouldEnableOrderSupportOnCreateOrder(),
                $decisionOptions,
                $options,
            );

            // 事前作成前イベント（AddCart 相当の調整。Options などをここで上書き可能）
            if ($this->eventDispatcher->hasListeners(Events::ON_PRE_CREATE_ORDER)) {
                $jyuden = $createOrderReq->getPrm()->getJyuden();
                $this->eventDispatcher->dispatch(
                    new OnPreCreateOrderEvent(
                        $jyuden->getTesuu() ?? 0,
                        $jyuden->getNebiki() ?? 0,
                        $jyuden->getSouryou() ?? 0,
                        $createOrderReq,
                        $shipping,
                        $config,
                        $options
                    ),
                    Events::ON_PRE_CREATE_ORDER
                );
            }

            // API 呼び出し
            $apiResponse = $this->executeCreateOrderMethod($createOrderReq);

            // エラーチェック（message1/message2 のみを使用）
            if ($this->hasErrorMessage($apiResponse->getOrder())) {
                throw new CouldNotCreateOrderException($apiResponse->getOrder());
            }

            // 注文作成後イベント
            if ($this->eventDispatcher->hasListeners(Events::POST_CREATE_ORDER)) {
                $this->eventDispatcher->dispatch(
                    new PostCreateOrderEvent($apiResponse, $shipping, $options),
                    Events::POST_CREATE_ORDER
                );
            }

            $this->em->persist($order);

            if ($shouldFlush) {
                $this->em->flush();
            }
        } catch (\Throwable $e) {
            if ($e instanceof CouldNotCreateOrderException) {
                $this->logger->error('通販Aceの注文作成に失敗しました。', ['exception' => $e]);
                throw $e;
            }

            $this->logger->error('通販Aceの注文作成に失敗しました。', ['exception' => $e]);
            // メッセージモデルがない場合は null を渡し、前段の例外のみを連結
            throw new CouldNotCreateOrderException(null, $e);
        }
    }

    /**
     * 注文事前作成の要件をバリデーション
     *
     * @param Shipping $shipping
     *
     * @return array [order, customer, customerAddress, config]
     *
     * @throws \LogicException
     */
    protected function validatePreCreate(Shipping $shipping): array
    {
        $order = $shipping->getOrder();
        $customer = $order->getCustomer();
        $customerAddress = $shipping->getCustomerAddress();

        if (null === $customer->getAceCustomerId()) {
            throw new \LogicException('会員IDが設定されていません。');
        }

        // 支払方法のACE決済IDを検証（Pcodeに相当）
        $payment = $order->getPayment();
        if ($payment === null || $payment->getAcePaymentId() === null) {
            throw new \LogicException('支払方法にACE決済IDが設定されていません。管理画面で支払方法にACE決済IDを設定してください。');
        }

        return [$order, $customer, $customerAddress, $this->aceConfigService->getConfig()];
    }

    /**
     * @return array{0:AddCartResponseModelInterface,1:PurchaseFlowResult}
     *
     * @throws OptimisticLockException
     * @throws ORMException
     * @throws CouldNotAddCartException
     *
     * TODO: cache the request object if the request is not modified
     *       or client parse the modifier callback to modify the last request cache object
     *      - to cache the last request object we should introduce the preExcecuteAddCartRequest
     *      - create the subscriber to collect the addCart request
     *      - we should hook up the subscriber when customer address changed, or when order items changed
     */
    public function syncShipping(
        Shipping $shipping,
        bool $shouldExecutePurchaseFlow = false,
        bool $canFlush = true,
        array $options = [],
        ?callable $modifier = null,
        ?string $cacheKey = null,
    ): array {
        $order = $shipping->getOrder();
        $customerAddress = $shipping->getCustomerAddress();
        $options = array_merge([
            '_trigger' => self::SYNC_SHIPPING_TRIGGER,
        ], $options);

        $addCartResponse = $this->doRequestAddCartWithCache(
            $shipping,
            $options,
            $customerAddress,
            'all',
            $cacheKey,
            $modifier,
        );

        $this->cartResponseToOrderSynchronizer->syncOrderFees($order, $addCartResponse->getOrder());
        $result = $this->executeShoppingPurchaseFlow($order, 'default', $shouldExecutePurchaseFlow);

        // Cart へ同期（通常のフィールドをすべて同期）
        $cart = $this->cartService->getCart();
        $this->cartOrderSynchronizer->syncCartFromOrder($order, $cart);

        $this->em->persist($order);
        $this->em->persist($cart);

        if ($canFlush) {
            $this->em->flush();
        }

        return [$addCartResponse, $result];
    }

    /**
     * @param Shipping $shipping
     * @param CustomerAddress|null $customerAddress
     * @param bool $shouldExecutePurchaseFlow
     * @param bool $canFlush
     * @param array $options
     *
     * @return PurchaseFlowResult|null
     *
     * @throws CouldNotAddCartException
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function syncDeliveryFee(
        Shipping $shipping,
        ?CustomerAddress $customerAddress,
        bool $shouldExecutePurchaseFlow = false,
        bool $canFlush = true,
        array $options = [],
    ): ?PurchaseFlowResult {
        $order = $shipping->getOrder();
        $options = array_merge([
            '_trigger' => self::SYNC_DELIVERY_FEE_TRIGGER,
        ], $options);

        $addCartResponse = $this->doRequestAddCartWithCache($shipping, $options, $customerAddress);

        $this->cartResponseToOrderSynchronizer->syncOrderFees($order, $addCartResponse->getOrder(), 'delivery_free');
        $result = $this->executeShoppingPurchaseFlow($order, 'delivery_update', $shouldExecutePurchaseFlow);

        // Cart へ同期（通常のフィールドをすべて同期）
        $cart = $this->cartService->getCart();
        $this->cartOrderSynchronizer->syncCartFromOrder($order, $cart);

        $this->em->persist($order);
        $this->em->persist($cart);

        if ($canFlush) {
            $this->em->flush();
        }

        return $result;
    }

    /**
     * 付与予定ポイントを Ace 側で再計算し、Order へ反映する.
     *
     * @param Shipping $shipping 対象の配送（受注は shipping->getOrder() から辿る）
     * @param bool $shouldExecutePurchaseFlow 購入フローの再計算を行うか
     * @param bool $canFlush flush 実行可否
     * @param array $options 任意オプション
     *
     * @return PurchaseFlowResult|null
     *
     * @throws CouldNotAddCartException
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function syncEarnablePoint(
        Shipping $shipping,
        bool $shouldExecutePurchaseFlow = false,
        bool $canFlush = true,
        array $options = [],
    ): ?PurchaseFlowResult {
        $order = $shipping->getOrder();
        $customerAddress = $shipping->getCustomerAddress();
        $options = array_merge([
            '_trigger' => self::SYNC_EARNABLE_POINT_TRIGGER,
        ], $options);

        try {
            $addCartResponse = $this->doRequestAddCartWithCache(
                $shipping,
                $options,
                $customerAddress,
                'point',
                'ace_sync_earnable_point',
            );
        } catch (\Throwable $e) {
            if ($e instanceof CouldNotAddCartException) {
                $this->logger->error('通販Aceのカート追加（ポイント再計算）に失敗しました。', ['exception' => $e]);
                throw $e;
            }

            $this->logger->error('通販Aceのカート追加（ポイント再計算）に失敗しました。', ['exception' => $e]);
            throw new CouldNotAddCartException(null, $e);
        }

        $this->cartResponseToOrderSynchronizer->syncOrderFees($order, $addCartResponse->getOrder(), 'point');
        $result = $this->executeShoppingPurchaseFlow($order, 'point_update', $shouldExecutePurchaseFlow);

        // Cart へは付与予定ポイントのみ同期（その他の項目は除外）
        $cart = $this->cartService->getCart();
        $this->cartOrderSynchronizer->syncCartFromOrder($order, $cart, [
            'include_fields' => [
                'ace_earnable_point',
            ],
        ]);

        $this->em->persist($order);
        $this->em->persist($cart);

        if ($canFlush) {
            $this->em->flush();
        }

        return $result;
    }

    /**
     * AddCart リクエストを中央化して生成する.
     *
     * @param Shipping $shipping
     * @param array $options
     * @param CustomerAddress|null $customerAddress
     * @param string $calcSupportMode 'point'|'message'|'all'|null
     * @param string|null $cacheKey
     * @param callable|null $modifier
     *
     * @return AddCartResponseModelInterface
     *
     * @throws CouldNotAddCartException
     */
    protected function doRequestAddCartWithCache(
        Shipping $shipping,
        array $options = [],
        ?CustomerAddress $customerAddress = null,
        string $calcSupportMode = 'all',
        ?string $cacheKey = null,
        ?callable $modifier = null,
    ): AddCartResponseModelInterface {
        $factory = function () use ($shipping, $customerAddress, $options, $calcSupportMode) {
            // 中央化した組み立て（ポイント再計算）
            return $this->createAddCartRequest($shipping, $customerAddress, $options, $calcSupportMode);
        };

        try {
            return $this->cartBridge->executeAddCartRequestWithCache($factory, $options, $cacheKey, $modifier);
        } catch (\Throwable $e) {
            if ($e instanceof CouldNotAddCartException) {
                $this->logger->error('通販Aceのカート追加（ポイント再計算）に失敗しました。', ['exception' => $e]);
                throw $e;
            }

            $this->logger->error('通販Aceのカート追加（ポイント再計算）に失敗しました。', ['exception' => $e]);
            throw new CouldNotAddCartException(null, $e);
        }
    }

    /**
     * AddCart リクエストを中央化して生成する.
     *
     * @param Shipping $shipping
     * @param CustomerAddress|null $customerAddress
     * @param array $options
     * @param string|null $calcSupportMode 'point'|'message'|'all'|null
     *
     * @return AddCartRequestModelInterface
     */
    protected function createAddCartRequest(Shipping $shipping, ?CustomerAddress $customerAddress, array $options = [], ?string $calcSupportMode = null): AddCartRequestModelInterface
    {
        $config = $this->aceConfigService->getConfig();
        $order = $shipping->getOrder();
        $customer = $order->getCustomer();

        // 最小構成でAceへ問い合わせたい場合（ポイント再計算/送料更新）は Jyuden 拡張生成を抑制
        $trigger = $options['_trigger'] ?? null;
        if ($calcSupportMode === 'point' || in_array($trigger, [self::SYNC_DELIVERY_FEE_TRIGGER, self::SYNC_SHIPPING_TRIGGER, self::SYNC_EARNABLE_POINT_TRIGGER])) {
            $options['_exclude_jyuden_build'] = true;
        }

        /** @var AddCartRequestModelInterface $request */
        $request = $this->orderDataConverter->buildAddCartRequest(
            $shipping,
            $order,
            $customer,
            $customerAddress,
            $config,
            $this->getSyid(),
            $this->session->getId(),
            true,
            AddCartFlow::shoppingAdd(),
            $options
        );

        if ($calcSupportMode !== null) {
            $prm = $request->getPrm();
            $opts = $prm->getOptions();
            if ($opts === null) {
                $opts = new OptionsModel();
                $prm->setOptions($opts);
            }
            $opts->setCalcSupportMode($calcSupportMode);
            $request->getPrm()->getJyuden()->setPointm($order->getUsePoint());
        }

        return $request;
    }

    /**
     * 統合API CreateOrder を実行します。
     *
     * @param CreateOrderRequestModelInterface $request
     *
     * @return CreateOrderResponseModelInterface レスポンスモデル
     *
     * @throws MissingRequestParameterException
     */
    protected function executeCreateOrderMethod(CreateOrderRequestModelInterface $request): CreateOrderResponseModelInterface
    {
        $response = $this->createOrderMethod
            ->withRequest($request)
            ->send();

        if (!$response->isOk()) {
            throw new \RuntimeException(sprintf('通販Aceの統合注文作成処理に失敗しました: %s', $response->getStatusCode()));
        }

        return $response->getResponse();
    }

    /**
     * @param int $orderId
     *
     * @return string|null - null if not exits
     */
    public function getAceOrderId(int $orderId): ?string
    {
        if (null === $freeKubun = $this->eccubeConfig->get('ace.free.ec_order_id')) {
            throw new \LogicException('ace.free.ec_order_idを指定してください。');
        }

        try {
            $request = [
                'syid' => $this->getSyid(),
                'ecOrderNo' => $orderId,
                'freeKubun' => $freeKubun,
            ];
            $respone = $this->getAceOrderIdMethod->withArrayRequest($request)->send();

            if ($respone->getStatusCode() === Response::HTTP_NOT_FOUND) {
                return null;
            }

            return $respone->getResponse();
        } catch (ClientException $e) {
            if ($e->getResponse()->getStatusCode() === Response::HTTP_NOT_FOUND) {
                return null;
            }

            $this->logger->error('通販Aceの顧客取得する時に、エラーが発生しました。', [
                'message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
            ]);

            throw $e;
        } catch (\Throwable $e) {
            $this->logger->error('通販Aceの顧客取得する時に、エラーが発生しました。', [
                'message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
            ]);

            throw new \RuntimeException('通販Aceの顧客取得処理に失敗しました。', $e);
        }
    }
}
