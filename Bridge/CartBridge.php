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
use Plugin\AceClient43\Entity\CustomerTrait;
use Plugin\AceClient43\Entity\ProductClassTrait;
use Plugin\AceClient43\Events\Events;
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
     *
     * @return void
     *
     * @throws \LogicException
     */
    public function add(Cart $cart)
    {
        /** @var CustomerTrait|Customer $customer */
        $customer = $cart->getCustomer();
        if (null === $customer->getAceMemberId()) {
            $this->logger->error('会員IDが設定されていません。', ['customer' => $customer]);
            throw new \LogicException('会員IDが設定されていません。');
        }

        $member = (new RequestAddCart\MemberOrderModel())
            ->setJmember(
                (new RequestAddCart\JmemberModel())->setCode($customer->getAceMemberId())
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
            )
        ;

        $request = (new RequestAddCart\AddCartRequestModel())
            ->setPrm($prm)
            ->setId($this->getSyid())
            ->setPrm($prm);

        $this->eventDispatcher->dispatch(
            new PreAddCartEvent($request, $cart),
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

            $this->eventDispatcher->dispatch(
                new PostAddCartEvent($responseObject, $cart),
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
}
