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
use Eccube\Entity\Customer;
use Eccube\Entity\ProductClass;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\AddCartResponseModelInterface;
use Plugin\AceClient43\AceServices\Service\JyudenService;
use Plugin\AceClient43\Entity\Config;
use Plugin\AceClient43\Entity\CustomerTrait;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\OnCalculateFeeCartEvent;
use Plugin\AceClient43\Events\OnSetJyumeiModelEvent;
use Plugin\AceClient43\Events\OnSetOrderPrmModelEvent;
use Plugin\AceClient43\Events\PostAddCartEvent;
use Plugin\AceClient43\Events\PreAddCartEvent;
use Plugin\AceClient43\Exception\CouldNotAddCartException;

/**
 * 通販Aceのカート追加処理を行うブリッジクラス
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class CartBridge extends BaseBridge
{
    private JyudenService $jyudenService;

    public function __construct(JyudenService $jyudenService)
    {
        $this->jyudenService = $jyudenService;
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
        $config = $this->getConfig();
        $request = $this->createRequest($cart, $config, $canFlush, $options);

        $this->eventDispatcher->dispatch(
            new PreAddCartEvent($request, $cart, $options, $config),
            Events::PRE_ADD_CART
        );

        try {
            $response = $this->jyudenService->makeAddCartMethod()
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                throw new CouldNotAddCartException(sprintf('通販Aceのカート追加処理に失敗しました: %s', $response->getStatusCode()));
            }

            /** @var AddCartResponseModelInterface $responseObject */
            $responseObject = $response->getResponse();
            if ($this->hasErrorMessage($responseObject->getOrder())) {
                throw new CouldNotAddCartException('通販Aceのカート追加に失敗しました。');
            }

            $needFlush = false;

            if ($config->isUseAceDeliveryFeeInstead()) {
                if ($this->attachDeliveryFeeToCart($responseObject, $cart, $canFlush, $options)) {
                    $needFlush = true;
                }
            }

            if ($config->isUseAceDiscountInstead()) {
                if ($this->attachDiscountToCart($responseObject, $cart, $canFlush, $options)) {
                    $needFlush = true;
                }
            }

            if ($config->isUseAceChargeInstead()) {
                if ($this->attachChargeToCart($responseObject, $cart, $canFlush, $options)) {
                    $needFlush = true;
                }
            }

            $this->eventDispatcher->dispatch(
                new PostAddCartEvent($responseObject, $cart, $options, $config),
                Events::POST_ADD_CART
            );

            if ($needFlush) {
                $this->em->flush($cart);
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
     * @return RequestAddCart\AddCartRequestModel
     *
     * @throws \LogicException
     */
    private function createRequest(Cart $cart, Config $config, bool $canFlush, array $options): RequestAddCart\AddCartRequestModel
    {
        /** @var CustomerTrait|Customer $customer */
        $customer = $cart->getCustomer();
        if (null === $customer->getAceCustomerId()) {
            $this->logger->error('会員IDが設定されていません。', ['customer' => $customer]);
            throw new \LogicException('会員IDが設定されていません。');
        }

        $member = (new RequestAddCart\MemberOrderModel())
            ->setJmember(
                (new RequestAddCart\JmemberModel())->setCode($customer->getAceCustomerId())
            );

        $jyuden = (new RequestAddCart\JyudenModel())
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
            /** @var ProductClass $productClass */
            $productClass = $item->getProductClass();

            $jyumei = (new RequestAddCart\JyumeiModel())
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

        $hasEventSubscribed = $this->eventDispatcher->hasListeners(Events::ON_SET_ORDER_PRM_MODEL);

        $prm = (new RequestAddCart\OrderPrmModel())
            ->setMember($member)
            ->setJyuden($jyuden)
            ->setDetail((new RequestAddCart\DetailModel())
                ->setJyumei($jyumeis)
            );

        if ($hasEventSubscribed) {
            $event = new OnSetOrderPrmModelEvent($prm, $cart, $options);
            $this->eventDispatcher->dispatch($event, Events::ON_SET_ORDER_PRM_MODEL);
        }

        return (new RequestAddCart\AddCartRequestModel())
            ->setPrm($prm)
            ->setId($this->getSyid())
            ->setSessId($this->session->getId());
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
