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
use Eccube\Entity\CustomerAddress;
use Eccube\Entity\Shipping;
use Eccube\Service\CartService;
use Eccube\Service\PurchaseFlow\PurchaseFlow;
use Eccube\Service\PurchaseFlow\PurchaseFlowResult;
use Plugin\AceClient43\AceServices\AceMethod\Jyuden\AddCartMethod;
use Plugin\AceClient43\AceServices\AceMethod\Jyuden\CreateOrderMethod;
use Plugin\AceClient43\AceServices\AceMethod\Jyuden\DecisionCartMethod;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\OptionsModel;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\CreateOrder\CreateOrderRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\CreateOrder\CreateOrderResponseModelInterface;
use Plugin\AceClient43\Bridge\DataConverter\OrderDataConverterInterface;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\OnPreCreateOrderEvent;
use Plugin\AceClient43\Events\PostCreateOrderEvent;
use Plugin\AceClient43\Exception\CouldNotAddCartException;
use Plugin\AceClient43\Exception\CouldNotCreateOrderException;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\Service\CartOrderSyncService;
use Plugin\AceClient43\Service\DeliveryFeeProcessor;
use Plugin\AceClient43\Traits\GetUserTrait;
use Plugin\AceClient43\Traits\ShoppingPurchaseFlowTrait;

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

    protected OrderDataConverterInterface $orderDataConverter;

    protected AddCartMethod $addCartMethod;

    protected DecisionCartMethod $decisionCartMethod;

    /** @var CreateOrderMethod 統合API用メソッド */
    protected CreateOrderMethod $createOrderMethod;

    protected CartBridge $cartBridge;

    protected DeliveryFeeProcessor $deliveryFeeProcessor;

    protected PurchaseFlow $purchaseFlow;

    protected CartOrderSyncService $cartOrderSyncService;

    protected CartService $cartService;

    public function __construct(
        PurchaseFlow $purchaseFlow,
        OrderDataConverterInterface $orderDataConverter,
        AddCartMethod $addCartMethod,
        DecisionCartMethod $decisionCartMethod,
        CreateOrderMethod $createOrderMethod,
        CartBridge $cartBridge,
        DeliveryFeeProcessor $deliveryFeeProcessor,
        CartOrderSyncService $cartOrderSyncService,
        CartService $cartService,
    ) {
        $this->orderDataConverter = $orderDataConverter;
        $this->addCartMethod = $addCartMethod;
        $this->decisionCartMethod = $decisionCartMethod;
        $this->createOrderMethod = $createOrderMethod;
        $this->cartBridge = $cartBridge;
        $this->deliveryFeeProcessor = $deliveryFeeProcessor;
        $this->purchaseFlow = $purchaseFlow;
        $this->cartService = $cartService;
        $this->cartOrderSyncService = $cartOrderSyncService;
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
     * @param array $options 任意の追加オプション（イベントリスナ用）
     *
     * @throws CouldNotCreateOrderException
     */
    public function create(Shipping $shipping, array $decisionOptions = [], array $options = []): void
    {
        $config = $this->aceConfigService->getConfig();

        try {
            // 受注明細や顧客情報の妥当性をチェック（AddCart 前提と同一）
            [$order, $customer, $customerAddress, $config] = $this->orderDataConverter->validatePreCreate($shipping, $config);

            $sessionId = $this->session->getId();

            // 統合リクエストをコンバータで生成（prm と Decision オプションの両方を内包）
            /** @var CreateOrderRequestModelInterface $createOrderReq */
            $createOrderReq = $this->orderDataConverter->convertToRequest(
                $shipping,
                $order,
                $customer,
                $customerAddress,
                $config,
                $this->getSyid(),
                $sessionId,
                $decisionOptions
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
    public function syncDeliveryFee(Shipping $shipping, ?CustomerAddress $customerAddress, bool $shouldExecutePurchaseFlow = false, bool $canFlush = true, array $options = []): ?PurchaseFlowResult
    {
        $options = array_merge([
            '_trigger' => self::SYNC_DELIVERY_FEE_TRIGGER,
        ], $options);

        // 中央化した組み立て
        [$addCartRequest, $config] = $this->createAddCartRequest($shipping, $customerAddress, $options, null);
        // 送料計算時はキャンペーンを適用
        $addCartRequest->getPrm()->getJyuden()->useCampaign();

        try {
            $addCartResponse = $this->cartBridge->executeAddCartRequest($addCartRequest, $config, $options);
        } catch (\Throwable $e) {
            if ($e instanceof CouldNotAddCartException) {
                $this->logger->error('通販Aceのカート追加に失敗しました。', ['exception' => $e]);
                throw $e;
            }

            $this->logger->error('通販Aceのカート追加に失敗しました。', ['exception' => $e]);
            throw new CouldNotAddCartException(null, $e);
        }

        $order = $shipping->getOrder();
        $deliveryFree = $addCartResponse->getOrder()->getJyuden()->getSouryouzn();
        $order->setAceDeliveryFee($deliveryFree);

        // PurchaseFlow（必要時のみ）
        $result = $this->executeShoppingPurchaseFlow($order, 'delivery_update', $shouldExecutePurchaseFlow);

        // Cart へ同期（通常のフィールドをすべて同期）
        $cart = $this->cartService->getCart();
        $this->cartOrderSyncService->syncCartFromOrder($order, $cart);

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
    public function syncEarnablePoint(Shipping $shipping, bool $shouldExecutePurchaseFlow = false, bool $canFlush = true, array $options = []): ?PurchaseFlowResult
    {
        $options = array_merge([
            '_trigger' => self::SYNC_EARNABLE_POINT_TRIGGER,
        ], $options);

        // 中央化した組み立て（ポイント再計算）
        [$addCartRequest, $config] = $this->createAddCartRequest($shipping, $shipping->getOrder()->getFirstCustomerAddress(), $options, 'point');

        try {
            $addCartResponse = $this->cartBridge->executeAddCartRequest($addCartRequest, $config, $options);
        } catch (\Throwable $e) {
            if ($e instanceof CouldNotAddCartException) {
                $this->logger->error('通販Aceのカート追加（ポイント再計算）に失敗しました。', ['exception' => $e]);
                throw $e;
            }

            $this->logger->error('通販Aceのカート追加（ポイント再計算）に失敗しました。', ['exception' => $e]);
            throw new CouldNotAddCartException(null, $e);
        }

        $order = $shipping->getOrder();

        // Ace 側の付与予定ポイントを Order へ反映
        $earnablePoint = $addCartResponse->getOrder()->getEarnablePoints();
        $order->setAceEarnablePoint($earnablePoint);

        // PurchaseFlow（必要時のみ）
        $result = $this->executeShoppingPurchaseFlow($order, 'point_update', $shouldExecutePurchaseFlow);

        // Cart へは付与予定ポイントのみ同期（その他の項目は除外）
        $cart = $this->cartService->getCart();
        $this->cartOrderSyncService->syncCartFromOrder($order, $cart, [
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
     * @param CustomerAddress|null $customerAddress
     * @param array $options
     * @param string|null $calcSupportMode 'point'|'message'|'all'|null
     *
     * @return array{0:AddCartRequestModelInterface,1:\Plugin\AceClient43\Entity\Config}
     */
    private function createAddCartRequest(Shipping $shipping, ?CustomerAddress $customerAddress, array $options = [], ?string $calcSupportMode = null): array
    {
        $config = $this->aceConfigService->getConfig();
        $order = $shipping->getOrder();
        $customer = $order->getCustomer();

        // 最小構成でAceへ問い合わせたい場合（ポイント再計算/送料更新）は Jyuden 拡張生成を抑制
        $trigger = $options['_trigger'] ?? null;
        if ($calcSupportMode === 'point' || $trigger === OrderBridge::class.'::syncDeliveryFee') {
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

        return [$request, $config];
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
    private function executeCreateOrderMethod(CreateOrderRequestModelInterface $request)
    {
        $response = $this->createOrderMethod
            ->withRequest($request)
            ->send();

        if (!$response->isOk()) {
            throw new \RuntimeException(sprintf('通販Aceの統合注文作成処理に失敗しました: %s', $response->getStatusCode()));
        }

        return $response->getResponse();
    }
}
