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

use Eccube\Entity\OrderItem;
use Eccube\Entity\Shipping;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;
use Plugin\AceClient43\Bridge\Helper\OrderBridgeHelper;
use Plugin\AceClient43\Entity\Config;
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
    private OrderBridgeHelper $helper;

    public function __construct(OrderBridgeHelper $helper)
    {
        $this->helper = $helper;
    }

    /**
     * カート作成
     *
     * @param Shipping $shipping
     * @param array $options
     *
     * @return void
     *
     * @throws CouldNotPreCreateOrderException
     * @throws CouldNotCreateOrderException
     * @throws \LogicException
     */
    public function new(Shipping $shipping, array $options = []): void
    {
        $sessionId = $this->preCreate($shipping, $options);
        $this->create($sessionId, $shipping, $options);
    }

    /**
     * カートを事前作成
     *
     * @param Shipping $shipping
     * @param array $options
     *
     * @return string Session ID
     *
     * @throws CouldNotPreCreateOrderException
     * @throws \LogicException
     */
    private function preCreate(Shipping $shipping, array $options): string
    {
        $config = $this->aceConfigService->getConfig();

        try {
            [$order, $customer, $customerAddress, $config] = $this->helper->validatePreCreate($shipping, $config);

            $sessionId = $this->session->getId();
            $request = $this->helper->createPreCreateRequest(
                $shipping,
                $order,
                $customer,
                $customerAddress,
                $config,
                $this->getSyid(),
                $sessionId
            );

            // イベント発火（事前作成前）
            $jyuden = $request->getPrm()->getJyuden();
            $this->eventDispatcher->dispatch(
                new OnPreCreateOrderEvent(
                    $jyuden->getTesuu() ?? 0,
                    $jyuden->getNebiki() ?? 0,
                    $jyuden->getSouryou() ?? 0,
                    $request,
                    $shipping,
                    $config,
                    $options
                ),
                Events::ON_PRE_CREATE_ORDER
            );

            // 注文商品に対するイベント発火
            foreach ($order->getOrderItems() as $item) {
                if ($item->isProduct()) {
                    $jyumei = $this->helper->createJyumei($item);
                    $this->processOrderItemEvent($item, $jyumei, $shipping, $config, $jyuden, $options);
                }
            }

            // API呼び出し
            $responseObject = $this->helper->executeAddCartMethod($request);

            // エラーチェック
            if ($this->hasErrorMessage($responseObject->getOrder())) {
                throw new CouldNotPreCreateOrderException('通販Aceの注文事前作成に失敗しました。');
            }

            // イベント発火（事前作成後）
            $this->eventDispatcher->dispatch(
                new PostPreCreateOrderEvent($responseObject, $shipping, $config, $options),
                Events::POST_PRE_CREATE_ORDER
            );

            return $sessionId;
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
     * 注文商品に対するイベント処理
     *
     * @param OrderItem $item
     * @param RequestAddCart\JyumeiModelInterface $jyumei
     * @param Shipping $shipping
     * @param Config $config
     * @param RequestAddCart\JyudenModelInterface $jyuden
     * @param array $options
     */
    private function processOrderItemEvent(
        OrderItem $item,
        RequestAddCart\JyumeiModelInterface $jyumei,
        Shipping $shipping,
        Config $config,
        RequestAddCart\JyudenModelInterface $jyuden,
        array $options,
    ): void {
        $this->eventDispatcher->dispatch(
            new OnBindJyumeiOrderEvent(
                $jyumei,
                [],
                0,
                0,
                $item,
                $shipping,
                $config,
                $jyuden,
                $options
            ),
            Events::ON_BIND_JYUMEI_ORDER
        );
    }

    /**
     * カートを確定
     *
     * @param string $sessionId
     * @param Shipping $shipping
     * @param array $options
     *
     * @return void
     *
     * @throws CouldNotCreateOrderException
     */
    private function create(string $sessionId, Shipping $shipping, array $options): void
    {
        $config = $this->aceConfigService->getConfig();

        try {
            $decisionRequest = $this->helper->createDecisionCartRequest($sessionId, $config->getSyid());

            // イベント発火（注文作成前）
            $this->eventDispatcher->dispatch(
                new OnCreateOrderEvent($decisionRequest, $shipping, $options),
                Events::ON_CREATE_ORDER
            );

            // API呼び出し
            $decisionResponseObject = $this->helper->executeDecisionCartMethod($decisionRequest);

            // エラーチェック
            if ($this->hasErrorMessage($decisionResponseObject->getOrder())) {
                throw new CouldNotCreateOrderException('通販Aceの注文作成に失敗しました。');
            }

            // イベント発火（注文作成後）
            $this->eventDispatcher->dispatch(
                new PostCreateOrderEvent($decisionResponseObject, $shipping, $options),
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
}
