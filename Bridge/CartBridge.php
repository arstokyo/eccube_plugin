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

use Doctrine\ORM\Exception\ORMException;
use Eccube\Entity\Cart;
use Eccube\Entity\CartItem;
use Plugin\AceClient43\AceServices\AceMethod\Jyuden\AddCartMethod;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\AddCartResponseModelInterface;
use Plugin\AceClient43\Entity\Config;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\OnCalculateFeeCartEvent;
use Plugin\AceClient43\Events\OnSetJyumeiModelEvent;
use Plugin\AceClient43\Events\PostAddCartEvent;
use Plugin\AceClient43\Events\PreAddCartEvent;
use Plugin\AceClient43\Exception\CouldNotAddCartException;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\InvalidClassNameException;
use Plugin\AceClient43\Service\AddCartHelper;

/**
 * 通販Aceのカート追加処理を行うブリッジクラス
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class CartBridge extends BaseBridge
{
    private AddCartMethod $addCartMethod;

    private AddCartHelper $addCartHelper;

    public function __construct(
        AddCartMethod $addCartMethod,
        AddCartHelper $addCartHelper,
    ) {
        $this->addCartMethod = $addCartMethod;
        $this->addCartHelper = $addCartHelper;
    }

    /**
     * カートを追加
     *
     * @param Cart $cart
     * @param bool $canFlush
     * @param array $options
     *
     * @return void
     *
     * @throws \LogicException
     * @throws CouldNotAddCartException
     */
    public function add(Cart $cart, bool $canFlush = false, array $options = []): void
    {
        $options = array_merge([
            '_trigger' => CartBridge::class,
            'should_sync_cart' => true,
        ], $options);

        $config = $this->config;
        $request = $this->createRequest($cart, $config, $canFlush, $options);

        if ($this->eventDispatcher->hasListeners(Events::PRE_ADD_CART)) {
            $this->eventDispatcher->dispatch(
                new PreAddCartEvent($request, $cart, $options, $config),
                Events::PRE_ADD_CART
            );
        }

        try {
            $response = $this->addCartMethod->withRequest($request)->send();

            if (!$response->isOk()) {
                throw new CouldNotAddCartException(sprintf('通販Aceのカート追加処理に失敗しました: %s', $response->getStatusCode()));
            }

            /** @var AddCartResponseModelInterface $responseObject */
            $responseObject = $response->getResponse();
            if ($this->hasErrorMessage($responseObject->getOrder())) {
                throw new CouldNotAddCartException('通販Aceのカート追加に失敗しました。');
            }

            $needFlush = false;

            if ($config->shouldUseAceDelivery()) {
                if ($this->attachDeliveryFeeToCart($responseObject, $cart, $canFlush, $options)) {
                    $needFlush = true;
                }
            }

            if ($config->shouldUseAceDiscount()) {
                if ($this->attachDiscountToCart($responseObject, $cart, $canFlush, $options)) {
                    $needFlush = true;
                }
            }

            if ($config->shouldUseAceCharge()) {
                if ($this->attachChargeToCart($responseObject, $cart, $canFlush, $options)) {
                    $needFlush = true;
                }
            }

            if ($needFlush) {
                $this->em->flush($cart);
            }

            // 通販Aceのレスポンスをカートに同期
            if ($options['should_sync_cart']) {
                $this->addCartHelper->syncCart($cart, $responseObject->getOrder(), $options) || $needFlush;
            }

            if ($this->eventDispatcher->hasListeners(Events::POST_ADD_CART)) {
                $this->eventDispatcher->dispatch(
                    new PostAddCartEvent($responseObject, $cart, $options, $config),
                    Events::POST_ADD_CART
                );
            }
        } catch (\Throwable $e) {
            if ($e instanceof CouldNotAddCartException) {
                $this->logger->error('通販Aceのカート追加に失敗しました。', ['exception' => $e]);
                throw $e;
            }

            $this->logger->error('通販Aceのカート追加に失敗しました。', ['exception' => $e]);
            throw new CouldNotAddCartException('通販Aceのカート追加に失敗しました。', $e);
        }
    }

    /**
     * Create request for add cart
     *
     * @param Cart $cart
     * @param Config $config
     * @param bool $canFlush
     * @param array $options
     *
     * @return RequestAddCart\AddCartRequestModelInterface
     */
    private function createRequest(Cart $cart, Config $config, bool $canFlush, array $options): RequestAddCart\AddCartRequestModelInterface
    {
        $customer = $cart->getCustomer();
        if (null === $customer->getAceCustomerId()) {
            $this->logger->error('会員IDが設定されていません。', ['customer' => $customer]);
            throw new \LogicException('会員IDが設定されていません。');
        }

        [$request, $memberOrderModel, $jmemberModel, $jyudenModel, $orderPrmModel, $detailModel] = $this->createModels();

        $jmemberModel->setCode($customer->getAceCustomerId());
        $member = $memberOrderModel
            ->setJmember($jmemberModel);

        $jyuden = $jyudenModel
            ->setTorikbn($cart->getAceTransactionId())
            ->useCampaign($cart->isAceOrderSupportEnabled())
            ->setPcode($cart->getAcePaymentId());

        if ($config->hasOrderRouteId()) {
            $jyuden->setJcode($config->getOrderRouteId());
        }

        $hasEventSubscribed = $this->eventDispatcher->hasListeners(Events::ON_SET_JYUMEI_MODEL);
        $event = null;

        $jyumeis = [];
        /** @var CartItem $item */
        foreach ($cart->getCartItems() as $item) {
            $productClass = $item->getProductClass();

            /** @var RequestAddCart\JyumeiModelInterface $jyumeiModel */
            $jyumeiModel = $this->createSubModel(RequestAddCart\JyumeiModelInterface::class);
            $jyumei = $jyumeiModel
                ->setGcode($productClass->getAceProductId())
                ->setSuu($item->getQuantity())
                ->setTanka($item->getPrice())
                ->setTaxkbn($item->getAceTaxType())
                ->setRitu($item->getAceMarkupRate());

            // サブスクライバーがいる場合はON_SET_JYUMEI_MODELイベントをチェックして発行
            if ($hasEventSubscribed) {
                if (null === $event) {
                    $event = new OnSetJyumeiModelEvent($jyumei, $item, $options);
                } else {
                    $event->jyumeiModel = $jyumei;
                    $event->cartItem = $item;
                    $event->options = $options;
                }

                $this->eventDispatcher->dispatch($event, Events::ON_SET_JYUMEI_MODEL);
            }

            $jyumeis[] = $jyumei;
        }

        $prm = $orderPrmModel
            ->setMember($member)
            ->setJyuden($jyuden)
            ->setDetail($detailModel
                ->setJyumei($jyumeis)
            )->setOptions($options['_request_options'] ?? [])
        ;

        return $request
            ->setPrm($prm)
            ->setId($this->getSyid())
            ->setSessId($this->session->getId());
    }

    /**
     * Create models for add cart request
     *
     * @return array [RequestAddCart\AddCartRequestModelInterface, RequestAddCart\MemberOrderModelInterface, RequestAddCart\JmemberModel, RequestAddCart\JyudenModelInterface, RequestAddCart\OrderPrmModelInterface, RequestAddCart\DetailModelInterface]
     *
     * @throws DataTypeMissMatchException
     * @throws InvalidClassNameException
     */
    private function createModels(): array
    {
        $request = $this->createRequestModel(RequestAddCart\AddCartRequestModelInterface::class);
        $memberOrderModel = $this->createSubModel(RequestAddCart\MemberOrderModelInterface::class);
        $jmemberModel = $this->createSubModel(RequestAddCart\JmemberModel::class);
        $jyudenModel = $this->createSubModel(RequestAddCart\JyudenModelInterface::class);
        $orderPrmModel = $this->createSubModel(RequestAddCart\OrderPrmModelInterface::class);
        $detailModel = $this->createSubModel(RequestAddCart\DetailModelInterface::class);

        return [
            $request,
            $memberOrderModel,
            $jmemberModel,
            $jyudenModel,
            $orderPrmModel,
            $detailModel,
        ];
    }

    /**
     * @param AddCartResponseModelInterface $responseObject
     * @param Cart $cart
     * @param bool $canFlush
     * @param array $options
     *
     * @return bool
     *
     * @throws ORMException
     */
    private function attachDeliveryFeeToCart(AddCartResponseModelInterface $responseObject, Cart $cart, bool $canFlush, array $options): bool
    {
        $event = new OnCalculateFeeCartEvent($responseObject, $cart, $options, $canFlush);
        $this->eventDispatcher->dispatch($event, Events::ON_CALCULATE_DELIVERY_FEE_CART);

        if ($event->needFlush) {
            return true;
        }

        if (!$event->continue || 0 >= $deliveryFee = $responseObject->getOrder()->getJyuden()->getSouryouzn()) {
            return false;
        }

        $cart->setAceDeliveryFee($deliveryFee);
        $this->em->persist($cart);

        return true;
    }

    /**
     * @param Cart $cart
     * @param AddCartResponseModelInterface $responseObject
     * @param bool $canFlush
     * @param array $options
     *
     * @return bool needFlush
     *
     * @throws ORMException
     */
    private function attachDiscountToCart(AddCartResponseModelInterface $responseObject, Cart $cart, bool $canFlush, array $options): bool
    {
        $event = new OnCalculateFeeCartEvent($responseObject, $cart, $options, $canFlush);
        $this->eventDispatcher->dispatch($event, Events::ON_CALCULATE_DISCOUNT_CART);

        if ($event->needFlush) {
            return true;
        }

        if (!$event->continue || 0 >= $discount = $responseObject->getOrder()->getJyuden()->getNebikizn()) {
            return false;
        }

        $cart->setAceDiscountAmount($discount);
        $this->em->persist($cart);

        return true;
    }

    /**
     * @param Cart $cart
     * @param AddCartResponseModelInterface $responseObject
     * @param bool $canFlush
     * @param array $options
     *
     * @return bool needFlush
     *
     * @throws ORMException
     */
    private function attachChargeToCart(AddCartResponseModelInterface $responseObject, Cart $cart, bool $canFlush, array $options): bool
    {
        $event = new OnCalculateFeeCartEvent($responseObject, $cart, $options, $canFlush);
        $this->eventDispatcher->dispatch($event, Events::ON_CALCULATE_CHARGE_CART);

        if ($event->needFlush) {
            return true;
        }

        if (!$event->continue || 0 >= $charge = $responseObject->getOrder()->getJyuden()->getTesuuzn()) {
            return false;
        }

        $cart->setAceChargeFee($charge);
        $this->em->persist($cart);

        return true;
    }
}
