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
use Eccube\Entity\Customer;
use Eccube\Entity\ProductClass;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\AddCartResponseModelInterface;
use Plugin\AceClient43\AceServices\Service\JyudenService;
use Plugin\AceClient43\Entity\CartItemTrait;
use Plugin\AceClient43\Entity\CartTrait;
use Plugin\AceClient43\Entity\Constants\GoodsKbn;
use Plugin\AceClient43\Entity\CustomerTrait;
use Plugin\AceClient43\Entity\ProductClassTrait;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\OnAttachChargeToCartEvent;
use Plugin\AceClient43\Events\OnAttachDeliveryFeeToCartEvent;
use Plugin\AceClient43\Events\OnAttachDiscountToCartEvent;
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
    /**
     * @var JyudenService
     */
    private $jyudenService;

    public function __construct(
        JyudenService $jyudenService,
    ) {
        $this->jyudenService = $jyudenService;
    }

    /**
     * カートを追加
     *
     * @param Cart|CartTrait $cart
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
        $request = $this->createRequest($cart, $canFlush, $options);
        $config = $this->getConfig();

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

            [$deliveryFee, $discount, $charge] = $this->calculateDeliveryFeeAndDiscount($responseObject);
            $needFlush = false;

            if ($config->isUseAceDeliveryFeeInstead()) {
                if ($this->attachDeliveryFeeToCart($deliveryFee, $responseObject, $cart, $canFlush, $options)) {
                    $needFlush = true;
                }
            }

            if ($config->isUseAceDiscountInstead()) {
                if ($this->attachDiscountToCart($discount, $responseObject, $cart, $canFlush, $options)) {
                    $needFlush = true;
                }
            }

            if ($config->isUseAceChargeInstead()) {
                if ($this->attachChargeToCart($charge, $responseObject, $cart, $canFlush, $options)) {
                    $needFlush = true;
                }
            }

            if ($needFlush) {
                $this->em->flush($cart);
            }

            $this->eventDispatcher->dispatch(
                new PostAddCartEvent($responseObject, $cart, $options, $config),
                Events::POST_ADD_CART
            );
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
     * @param Cart|CartTrait $cart
     * @param bool $canFlush
     * @param array $options
     *
     * @return RequestAddCart\AddCartRequestModel
     *
     * @throws \LogicException
     */
    private function createRequest(Cart $cart, bool $canFlush, array $options): RequestAddCart\AddCartRequestModel
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

        /** @var RequestAddCart\JyudenModel $jyuden */
        $jyuden = (new RequestAddCart\JyudenModel())
            ->setTorikbn($cart->getAceTorihikiKubun())
            ->useCampaign($cart->getUseAceOrderSupport())
            ->setPcode($cart->getAceKsid());

        $jyumeis = [];
        /** @var CartItem|CartItemTrait $item */
        foreach ($cart->getCartItems() as $item) {
            /** @var ProductClass|ProductClassTrait $productClass */
            $productClass = $item->getProductClass();

            $jyumei = (new RequestAddCart\JyumeiModel())
                ->setGcode($productClass->getAceGdid())
                ->setSuu($item->getQuantity())
                ->setTanka($item->getPrice())
                ->setTaxkbn($item->getAceTaxKubun())
                ->setRitu($item->getAceKakeRitu());

            $jyumeis[] = $jyumei;
        }

        $prm = (new RequestAddCart\OrderPrmModel())
            ->setMember($member)
            ->setJyuden($jyuden)
            ->setDetail((new RequestAddCart\DetailModel())
                ->setJyumei($jyumeis)
            );

        return (new RequestAddCart\AddCartRequestModel())
            ->setPrm($prm)
            ->setId($this->getSyid())
            ->setPrm($prm);
    }

    private function calculateDeliveryFeeAndDiscount(AddCartResponseModelInterface $responseObject): array
    {
        $deliveryFee = 0;
        $discount = 0;
        $charge = 0;
        foreach ($responseObject->getOrder()->getJyumei() as $jyumei) {
            switch ($jyumei->getGkbn()) {
                case GoodsKbn::SORYOU:
                    $deliveryFee += $jyumei->getMoney();
                    break;
                case GoodsKbn::NEBIKI:
                    $discount += $jyumei->getMoney();
                    break;
                case GoodsKbn::TESU:
                    $charge += $jyumei->getMoney();
                    break;
            }
        }

        return [$deliveryFee, $discount, $charge];
    }

    /**
     * @param float $deliveryFee
     * @param AddCartResponseModelInterface $responseObject
     * @param Cart|CartTrait $cart
     * @param bool $canFlush
     * @param array $options
     *
     * @return bool
     */
    private function attachDeliveryFeeToCart(float $deliveryFee, AddCartResponseModelInterface $responseObject, Cart $cart, bool $canFlush, array $options): bool
    {
        $event = new OnAttachDeliveryFeeToCartEvent($deliveryFee, $responseObject, $cart, $options, $canFlush);
        $this->eventDispatcher->dispatch($event, Events::ON_ATTACH_DELIVERY_FEE_TO_CART);

        if ($event->needFlush) {
            return true;
        }

        if (!$event->continue || $deliveryFee <= 0) {
            return false;
        }

        $cart->setAceDeliveryFee($deliveryFee);
        $this->em->persist($cart);

        return true;
    }

    /**
     * @param float $discount
     * @param Cart|CartTrait $cart
     * @param AddCartResponseModelInterface $responseObject
     * @param bool $canFlush
     * @param array $options
     */
    private function attachDiscountToCart(float $discount, AddCartResponseModelInterface $responseObject, Cart $cart, bool $canFlush, array $options): bool
    {
        $event = new OnAttachDiscountToCartEvent($discount, $responseObject, $cart, $options, $canFlush);
        $this->eventDispatcher->dispatch($event, Events::ON_ATTACH_DISCOUNT_TO_CART);

        if ($event->needFlush) {
            return true;
        }

        if (!$event->continue || $discount <= 0) {
            return false;
        }

        $cart->setAceDiscountAmount($discount);
        $this->em->persist($cart);

        return true;
    }

    /**
     * @param float $charge
     * @param Cart|CartTrait $cart
     * @param AddCartResponseModelInterface $responseObject
     * @param bool $canFlush
     * @param array $options
     *
     * @return bool needFlush
     */
    private function attachChargeToCart(float $charge, AddCartResponseModelInterface $responseObject, Cart $cart, bool $canFlush, array $options): bool
    {
        $event = new OnAttachChargeToCartEvent($charge, $responseObject, $cart, $options, $canFlush);
        $this->eventDispatcher->dispatch($event, Events::ON_ATTACH_CHARGE_TO_CART);

        if ($event->needFlush) {
            return true;
        }

        if (!$event->continue || $charge <= 0) {
            return false;
        }

        $cart->setAceChargeFee($charge);
        $this->em->persist($cart);

        return true;
    }
}
