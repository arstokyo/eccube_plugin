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

namespace Plugin\AceClient43\Bridge;

use Eccube\Entity\Cart;
use Eccube\Entity\CartItem;
use Eccube\Service\CartService;
use Plugin\AceClient43\AceServices\AceMethod\Jyuden\AddCartMethod;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\AddCartResponseModelInterface;
use Plugin\AceClient43\Converter\AddCartConverterFactory;
use Plugin\AceClient43\Converter\AddCartFlow;
use Plugin\AceClient43\Converter\Corrector\AddCartRequestCorrectorApplier;
use Plugin\AceClient43\Entity\Config;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\OnExecuteAddCartRequestErrorEvent;
use Plugin\AceClient43\Events\PostAddCartEvent;
use Plugin\AceClient43\Events\PostExecuteAddCartRequestEvent;
use Plugin\AceClient43\Events\PreAddCartFilterCartItemEvent;
use Plugin\AceClient43\Exception\CouldNotAddCartException;
use Plugin\AceClient43\Processor\DeliveryFeeProcessor;
use Plugin\AceClient43\Repository\OrderRepository;
use Plugin\AceClient43\Synchronizer\AceCartResponseToCartSynchronizerInterface;

/**
 * 通販Aceのカート追加処理を行うブリッジクラス
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class CartBridge extends BaseBridge
{
    protected AddCartMethod $addCartMethod;

    protected AceCartResponseToCartSynchronizerInterface $addCartHelper;

    protected CartService $cartService;

    protected DeliveryFeeProcessor $deliveryFeeProcessor;

    protected AddCartConverterFactory $converterFactory;

    protected OrderRepository $orderRepository;

    protected AddCartRequestCorrectorApplier $addCartRequestCorrectorApplier;

    public function __construct(
        AddCartMethod $addCartMethod,
        AceCartResponseToCartSynchronizerInterface $aceCartResponseToCartSynchronizer,
        CartService $cartService,
        DeliveryFeeProcessor $deliveryFeeProcessor,
        AddCartConverterFactory $converterFactory,
        OrderRepository $orderRepository,
        AddCartRequestCorrectorApplier $addCartRequestCorrectorApplier,
    ) {
        $this->addCartMethod = $addCartMethod;
        $this->addCartHelper = $aceCartResponseToCartSynchronizer;
        $this->cartService = $cartService;
        $this->deliveryFeeProcessor = $deliveryFeeProcessor;
        $this->converterFactory = $converterFactory;
        $this->orderRepository = $orderRepository;
        $this->addCartRequestCorrectorApplier = $addCartRequestCorrectorApplier;
    }

    /**
     * カートを追加
     *
     * @param Cart $cart
     * @param bool $canFlush
     * @param array $options
     *
     * @return AddCartResponseModelInterface|null
     *
     * @throws CouldNotAddCartException
     */
    public function add(Cart $cart, bool $canFlush = false, array &$options = []): ?AddCartResponseModelInterface
    {
        $options = array_merge([
            '_trigger' => CartBridge::class,
        ], $options);

        $config = $this->aceConfigService->getConfig();

        $cartItems = $cart->getCartItems()->toArray();
        if ($this->eventDispatcher->hasListeners(Events::PRE_ADD_CART_FILTER_CART_ITEM)) {
            $filterEvent = new PreAddCartFilterCartItemEvent($cart, $config, $options, $this->cartService);
            $this->eventDispatcher->dispatch($filterEvent, Events::PRE_ADD_CART_FILTER_CART_ITEM);

            $options = $filterEvent->options;

            if ($filterEvent->shouldSkip) {
                $this->logger->warning('通販Aceのカート追加処理をスキップしました。');

                return null;
            }

            $cartItems = $filterEvent->getFilteredCartItems();
        }

        $request = $this->createRequest($cart, $config, $options, $cartItems);

        try {
            $responseObject = $this->executeAddCartRequest($request, $options);

            if ($this->eventDispatcher->hasListeners(Events::POST_ADD_CART)) {
                $this->eventDispatcher->dispatch(
                    new PostAddCartEvent($responseObject, $cart, $options, $config, $canFlush),
                    Events::POST_ADD_CART
                );
            }

            return $responseObject;
        } catch (\Throwable $e) {
            if ($e instanceof CouldNotAddCartException) {
                $this->logger->error('通販Aceのカート追加に失敗しました。', ['exception' => $e]);
                throw $e;
            }

            $this->logger->error('通販Aceのカート追加に失敗しました。', ['exception' => $e]);
            throw new CouldNotAddCartException(null, $e);
        }
    }

    /**
     * Execute AddCart with caching
     *
     * @throws CouldNotAddCartException
     * @throws \Throwable
     */
    public function executeAddCartRequestWithCache(\Closure $factory, array $options = [], ?string $cacheKey = null, ?\Closure $modifier = null): AddCartResponseModelInterface
    {
        return $this->doExecuteAddCart(
            function () use ($factory, $cacheKey, $modifier) {
                return $this->addCartMethod
                    ->withCaching($factory, $cacheKey, $modifier)
                    ->send();
            },
            $options,
            true,
            $cacheKey,
        );
    }

    /**
     * @param AddCartRequestModelInterface $request
     * @param array $options
     *
     * @return AddCartResponseModelInterface
     *
     * @throws CouldNotAddCartException|\Throwable
     */
    public function executeAddCartRequest(AddCartRequestModelInterface $request, array $options): AddCartResponseModelInterface
    {
        return $this->doExecuteAddCart(
            function () use ($request) {
                return $this->addCartMethod->withRequest($request)->send();
            },
            $options,
            false // fromCache = false
        );
    }

    /**
     * Common execution logic for add cart requests
     *
     * @param \Closure $executor Function that executes the actual request
     * @param array $options
     * @param bool $fromCache
     * @param string|null $cacheKey
     *
     * @return AddCartResponseModelInterface
     *
     * @throws CouldNotAddCartException
     * @throws \Throwable
     */
    protected function doExecuteAddCart(\Closure $executor, array $options, bool $fromCache, ?string $cacheKey = null): AddCartResponseModelInterface
    {
        try {
            $response = $executor();

            if (!$response->isOk()) {
                throw new CouldNotAddCartException(null, new \RuntimeException(sprintf('通販Aceのカート追加処理に失敗しました: %s', $response->getStatusCode())));
            }

            /** @var AddCartResponseModelInterface $responseObject */
            $responseObject = $response->getResponse();

            // Check for error messages in the response
            if ($this->hasErrorMessage($responseObject->getOrder())) {
                throw new CouldNotAddCartException($responseObject->getOrder());
            }

            // Dispatch post-execute event
            if ($this->eventDispatcher->hasListeners(Events::POST_EXECUTE_ADD_CART_REQUEST)) {
                $this->eventDispatcher->dispatch(
                    new PostExecuteAddCartRequestEvent($responseObject, $options, $fromCache, $cacheKey),
                    Events::POST_EXECUTE_ADD_CART_REQUEST,
                );
            }

            return $responseObject;
        } catch (\Throwable $e) {
            if ($this->eventDispatcher->hasListeners(Events::ON_EXECUTE_ADD_CART_REQUEST_ERROR)) {
                $errorEvent = new OnExecuteAddCartRequestErrorEvent($e, $options, $fromCache, $cacheKey);
                $this->eventDispatcher->dispatch(
                    $errorEvent,
                    Events::ON_EXECUTE_ADD_CART_REQUEST_ERROR
                );
            }

            throw $e;
        }
    }

    /**
     * Create request for add cart
     */
    protected function createRequest(Cart $cart, Config $config, array $options, ?array $cartItems = null): AddCartRequestModelInterface
    {
        $customer = $cart->getCustomer();
        if (null === $customer->getAceCustomerId()) {
            $this->logger->error('会員IDが設定されていません。', ['customer' => $customer]);
            throw new \LogicException('会員IDが設定されていません。');
        }

        // カート追加フロー用の不変なコンバータを生成
        $flow = AddCartFlow::cartAdd();
        $addCartRequestConverter = $this->converterFactory->createAddCartRequestConverter($flow);
        $jyumeiDataConverter = $this->converterFactory->createJyumeiDataConverter($flow);

        // Use converters with proper flow context
        $member = $addCartRequestConverter->buildMemberOrderModel($customer, null, $options);
        $jyuden = $addCartRequestConverter->buildJyudenModel(
            $cart->getAceTransactionId(),
            $config->isOrderSupportEnabledWhenAddCart(),
            $config,
            null,
            $options,
        );

        // Use provided cart items or get them from cart
        if ($cartItems === null) {
            $cartItems = $cart->getCartItems()->toArray();
        }

        $jyumeis = [];
        /** @var CartItem $item */
        foreach ($cartItems as $item) {
            if ($jyumeiDataConverter->shouldExcludeCartItem($item, $flow, $config->isOrderSupportEnabledWhenAddCart(), $options['_trigger'] ?? null)) {
                continue;
            }
            $jyumeis[] = $jyumeiDataConverter->convertCartItemToJyumei($item, $options);
        }

        /** @var RequestAddCart\OrderPrmModelInterface $prm */
        /** @var RequestAddCart\DetailModelInterface $detail */
        $prm = $this->createSubModel(RequestAddCart\OrderPrmModelInterface::class);
        $detail = $this->createSubModel(RequestAddCart\DetailModelInterface::class);

        $prm
            ->setMember($member)
            ->setJyuden($jyuden)
            ->setDetail($detail->setJyumei($jyumeis));

        /** @var AddCartRequestModelInterface $request */
        $request = $this->createRequestModel(AddCartRequestModelInterface::class);

        $request
            ->setPrm($prm)
            ->setId($this->getSyid())
            ->setSessId($this->session->getId());

        if ($this->addCartRequestCorrectorApplier->hasCorrectors()) {
            // リクエスト構築の最終段階で補正器を適用（補正器が存在する場合のみ）
            $context = [
                'cart' => $cart,
                'processingOrder' => $this->orderRepository->getProcessingOrder($cart->getPreOrderId()),
                'config' => $config,
                'customer' => $customer,
            ];
            $this->addCartRequestCorrectorApplier->apply($request, $flow, $context, $options);
        }

        return $request;
    }
}
