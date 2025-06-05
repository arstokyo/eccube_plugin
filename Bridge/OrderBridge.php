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

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Eccube\Entity\Master\TaxType;
use Eccube\Entity\Order;
use Eccube\Entity\OrderItem;
use Eccube\Entity\ProductClass;
use Eccube\Entity\Shipping;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\JyumeiModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart\DecisionCartRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\AddCartResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\DecisionCart\DecisionCartResponseModelInterface;
use Plugin\AceClient43\AceServices\Service\JyudenService;
use Plugin\AceClient43\Entity\Config;
use Plugin\AceClient43\Entity\Constants\TaxKubun;
use Plugin\AceClient43\Entity\CustomerAddressTrait;
use Plugin\AceClient43\Entity\CustomerTrait;
use Plugin\AceClient43\Entity\OrderItemTrait;
use Plugin\AceClient43\Entity\OrderTrait;
use Plugin\AceClient43\Entity\ProductClassTrait;
use Plugin\AceClient43\Entity\ShippingTrait;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\OnBindJyumeiOrderEvent;
use Plugin\AceClient43\Events\OnCreateOrderEvent;
use Plugin\AceClient43\Events\OnPreCreateOrderEvent;
use Plugin\AceClient43\Events\PostCreateOrderEvent;
use Plugin\AceClient43\Events\PostPreCreateOrderEvent;
use Plugin\AceClient43\Exception\CouldNotCreateOrderException;
use Plugin\AceClient43\Exception\CouldNotPreCreateOrderException;

/**
 * 注文関連の処理を行うブリッジクラス
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class OrderBridge extends BaseBridge
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
     * カート作成
     *
     * @param Shipping|ShippingTrait $shipping
     *
     * @return void
     *
     * @throws CouldNotPreCreateOrderException
     * @throws CouldNotCreateOrderException
     * @throws \LogicException
     */
    public function new(Shipping $shipping): void
    {
        $sessionId = $this->preCreate($shipping);
        $this->create($sessionId, $shipping);
    }

    /**
     * 事前作成のバリデーション
     *
     * @param Shipping|ShippingTrait $shipping
     *
     * @return array
     *
     * @throws \LogicException
     */
    private function validatePreCreate(Shipping $shipping)
    {
        $order = $shipping->getOrder();
        $customer = $order->getCustomer();
        $customerAddress = $shipping->getCustomerAddress();
        $config = $this->configRepository->get();

        if (null === $config) {
            $this->logger->error('AceClientプラグインの設定が取得できません。');
            throw new \LogicException('AceClientプラグインの設定を先に行ってください。');
        }

        if (null === $customer->getAceMemberId()) {
            $this->logger->error('会員IDが設定されていません。');
            throw new \LogicException('会員IDが設定されていません。');
        }

        if (null === $customerAddress->getAceEdaNo()) {
            $this->logger->error('会員住所枝番号が設定されていません。');
            throw new \LogicException('会員住所枝番号が設定されていません。');
        }

        return [$order, $customer, $customerAddress, $config];
    }

    /**
     * カートを事前作成
     *
     * @param Shipping|ShippingTrait $shipping
     *
     * @return string Session ID
     *
     * @throws CouldNotPreCreateOrderException
     * @throws \LogicException
     */
    public function preCreate(Shipping $shipping): string
    {
        [$order, $customer, $customerAddress, $config] = $this->validatePreCreate($shipping);

        $request = $this->createPreCreateRequest($shipping, $order, $customer, $customerAddress, $config);

        $this->eventDispatcher->dispatch(
            new OnPreCreateOrderEvent(
                $request->getPrm()->getJyuden()->getTesuu() ?? 0,
                $request->getPrm()->getJyuden()->getNebiki() ?? 0,
                $request->getPrm()->getJyuden()->getSouryou() ?? 0,
                $request,
                $shipping,
                $config
            ),
            Events::ON_PRE_CREATE_ORDER
        );

        try {
            $response = $this->jyudenService->makeAddCartMethod()
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                throw new CouldNotPreCreateOrderException(sprintf('通販Aceの注文事前作成処理に失敗しました: %s', $response->getStatusCode()));
            }

            /** @var AddCartResponseModelInterface $responseObject */
            $responseObject = $response->getResponse();
            if ($this->hasErrorMessage($responseObject->getOrder())) {
                throw new CouldNotPreCreateOrderException('通販Aceの注文事前作成に失敗しました。');
            }

            $this->eventDispatcher->dispatch(
                new PostPreCreateOrderEvent($responseObject, $shipping),
                Events::POST_PRE_CREATE_ORDER
            );

            return $request->getSessId() ?? $this->session->getId();
        } catch (\Throwable $e) {
            if ($e instanceof CouldNotPreCreateOrderException) {
                $this->logger->error('通販Aceの注文事前作成に失敗しました。', ['exception' => $e]);
                throw $e;
            }

            $this->logger->error('通販Aceの注文事前作成に失敗しました。', ['exception' => $e]);
            throw new CouldNotPreCreateOrderException('通販Aceの注文事前作成に失敗しました。', $e);
        }
    }

    /**
     * 事前作成リクエストの作成
     *
     * @param Shipping $shipping
     * @param Order|OrderTrait $order
     * @param Customer|CustomerTrait $customer
     * @param CustomerAddress|CustomerAddressTrait $customerAddress
     * @param Config $config
     *
     * @return RequestAddCart\AddCartRequestModel
     */
    private function createPreCreateRequest(Shipping $shipping, $order, $customer, $customerAddress, $config): RequestAddCart\AddCartRequestModel
    {
        $member = (new RequestAddCart\MemberOrderModel())
            ->setJmember((new RequestAddCart\JmemberModel())->setCode($customer->getAceMemberId()))
            ->setNmember((new RequestAddCart\NmemberModel())->setEda($customerAddress->getAceEdaNo()))
            ->setSmember((new RequestAddCart\SmemberModel())->setCode($customer->getAceMemberId()));

        /** @var RequestAddCart\JyudenModel $jyuden */
        $jyuden = (new RequestAddCart\JyudenModel())
            ->setTorikbn($order->getAceTorihikiKubun())
            ->setPcode($order->getAceKsid())
            ->setJcode($config->getJyuchuId())
            ->setNbikou1($shipping->getNote())
            ->setHday($shipping->getShippingDeliveryDate())
            ->setWeborderno($order->getId());

        $jyumeis = [];
        $charge = 0;
        $discount = 0;
        $deliveryFree = 0;
        /** @var OrderItem|OrderItemTrait $item */
        foreach ($order->getOrderItems() as $item) {
            if ($item->isCharge()) {
                $charge += $item->getPriceIncTax();
            }

            if ($item->isDiscount()) {
                $discount += $item->getPriceIncTax();
            }

            if ($item->isDeliveryFee()) {
                $deliveryFree += $item->getPriceIncTax();
            }

            if ($item->isProduct()) {
                $jyumei = $this->createJyumei($item);
                $jyumeis[] = $jyumei;
            }

            $this->eventDispatcher->dispatch(
                new OnBindJyumeiOrderEvent(
                    $jyumei,
                    $jyumeis,
                    $charge,
                    $discount,
                    $item,
                    $shipping,
                    $config,
                    $jyuden
                ),
                Events::ON_BIND_JYUMEI_ORDER
            );
        }

        if ($charge > 0) {
            $jyuden->setTesuu($charge);
        }

        if ($discount > 0) {
            $jyuden->setNebiki($discount);
        }

        if ($deliveryFree > 0) {
            $jyuden->setSouryou($deliveryFree);
        }

        $prm = (new RequestAddCart\OrderPrmModel())
            ->setMember($member)
            ->setJyuden($jyuden)
            ->setDetail((new RequestAddCart\DetailModel())
                ->setJyumei($jyumeis)
            )->setMailjyuden((new RequestAddCart\MailJyudenModel())
                ->setMail($order->getEmail())
            );

        return (new RequestAddCart\AddCartRequestModel())
            ->setPrm($prm)
            ->setId($this->getSyid())
            ->setPrm($prm);
    }

    /**
     * カートを確定
     *
     * @param string $sessionId
     * @param Shipping|ShippingTrait $shipping
     *
     * @return void
     *
     * @throws CouldNotCreateOrderException
     */
    public function create(string $sessionId, Shipping $shipping): void
    {
        $config = $this->configRepository->get();

        $decisionRequest = (new DecisionCartRequestModel())
            ->setId($config->getSyid())
            ->setSessId($sessionId);

        $this->eventDispatcher->dispatch(
            new OnCreateOrderEvent($decisionRequest, $shipping),
            Events::ON_CREATE_ORDER
        );

        try {
            $decisionResponse = $this->jyudenService->makeDecisionCartMethod()
                ->withRequest($decisionRequest)
                ->send();

            if (!$decisionResponse->isOk()) {
                throw new CouldNotCreateOrderException(sprintf('通販Aceの注文作成処理に失敗しました: %s', $decisionResponse->getStatusCode()));
            }

            /** @var DecisionCartResponseModelInterface $decisionResponseObject */
            $decisionResponseObject = $decisionResponse->getResponse();
            if ($this->hasErrorMessage($decisionResponseObject->getOrder())) {
                throw new CouldNotCreateOrderException('通販Aceの注文作成に失敗しました。');
            }

            $this->eventDispatcher->dispatch(
                new PostCreateOrderEvent($decisionResponseObject, $shipping),
                Events::POST_CREATE_ORDER
            );
        } catch (\Throwable $e) {
            if ($e instanceof CouldNotCreateOrderException) {
                $this->logger->error('通販Aceの注文作成に失敗しました。', ['exception' => $e]);
                throw $e;
            }

            $this->logger->error('通販Aceの注文作成に失敗しました。', ['exception' => $e]);
            throw new CouldNotCreateOrderException('通販Aceの注文作成に失敗しました。', $e);
        }
    }

    /**
     * JyumeiModelを作成
     *
     * @param OrderItem|OrderItemTrait $item
     *
     * @return JyumeiModelInterface
     */
    private function createJyumei(OrderItem $item): JyumeiModelInterface
    {
        /** @var ProductClass|ProductClassTrait $productClass */
        $productClass = $item->getProductClass();

        $taxKbn = TaxKubun::ZEINUKI;
        switch ($item->getTaxType()) {
            case TaxType::TAXATION:
                $taxKbn = TaxKubun::ZEIKOMI;
                break;
            case TaxType::NON_TAXABLE:
                $taxKbn = TaxKubun::ZEINUKI;
                break;
            case TaxType::TAX_EXEMPT:
                $taxKbn = TaxKubun::HIKAZEI;
                break;
        }

        $price = $taxKbn === TaxKubun::ZEINUKI
            ? $item->getPrice()
            : $item->getPriceIncTax();

        $jyumei = (new RequestAddCart\JyumeiModel())
            ->setGcode($productClass->getAceGdid())
            ->setSuu($item->getQuantity())
            ->setTanka($price)
            ->setIgnorezaiko($item->isAceIgnoreStock())
            ->setRitu($item->getAceKakeRitu());

        return $jyumei;
    }
}
