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

use Eccube\Entity\Shipping;
use Plugin\AceClient43\AceServices\AceMethod\Jyuden\AddCartMethod;
use Plugin\AceClient43\AceServices\AceMethod\Jyuden\DecisionCartMethod;
use Plugin\AceClient43\Bridge\DataConverter\OrderDataConverterInterface;
use Plugin\AceClient43\Events\Events;
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
    private OrderDataConverterInterface $orderDataConverter;

    private AddCartMethod $addCartMethod;

    private DecisionCartMethod $decisionCartMethod;

    public function __construct(
        OrderDataConverterInterface $orderDataConverter,
        AddCartMethod $addCartMethod,
        DecisionCartMethod $decisionCartMethod,
    ) {
        $this->orderDataConverter = $orderDataConverter;
        $this->addCartMethod = $addCartMethod;
        $this->decisionCartMethod = $decisionCartMethod;
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
            // データコンバーターでバリデーション
            [$order, $customer, $customerAddress, $config] = $this->orderDataConverter->validatePreCreate($shipping, $config);

            $sessionId = $this->session->getId();

            // データコンバーターでリクエストを作成
            $request = $this->orderDataConverter->convertToAddCartRequest(
                $shipping,
                $order,
                $customer,
                $customerAddress,
                $config,
                $this->getSyid(),
                $sessionId
            );

            // イベント発火（事前作成前）- パフォーマンス向上のためリスナーの存在をチェック
            if ($this->eventDispatcher->hasListeners(Events::ON_PRE_CREATE_ORDER)) {
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
            }

            // API呼び出し
            $responseObject = $this->executeAddCartMethod($request);

            // エラーチェック
            if ($this->hasErrorMessage($responseObject->getOrder())) {
                throw new CouldNotPreCreateOrderException('通販Aceの注文事前作成に失敗しました。');
            }

            // イベント発火（事前作成後）- パフォーマンス向上のためリスナーの存在をチェック
            if ($this->eventDispatcher->hasListeners(Events::POST_PRE_CREATE_ORDER)) {
                $this->eventDispatcher->dispatch(
                    new PostPreCreateOrderEvent($responseObject, $shipping, $config, $options),
                    Events::POST_PRE_CREATE_ORDER
                );
            }

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
            // データコンバーターでデシジョンリクエストを作成
            $decisionRequest = $this->orderDataConverter->convertToDecisionCartRequest($sessionId, $config->getSyid());

            // イベント発火（注文作成前）- パフォーマンス向上のためリスナーの存在をチェック
            if ($this->eventDispatcher->hasListeners(Events::ON_CREATE_ORDER)) {
                $this->eventDispatcher->dispatch(
                    new OnCreateOrderEvent($decisionRequest, $shipping, $options),
                    Events::ON_CREATE_ORDER
                );
            }

            // API呼び出し
            $decisionResponseObject = $this->executeDecisionCartMethod($decisionRequest);

            // エラーチェック
            if ($this->hasErrorMessage($decisionResponseObject->getOrder())) {
                throw new CouldNotCreateOrderException('通販Aceの注文作成に失敗しました。');
            }

            // イベント発火（注文作成後）- パフォーマンス向上のためリスナーの存在をチェック
            if ($this->eventDispatcher->hasListeners(Events::POST_CREATE_ORDER)) {
                $this->eventDispatcher->dispatch(
                    new PostCreateOrderEvent($decisionResponseObject, $shipping, $options),
                    Events::POST_CREATE_ORDER
                );
            }
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
     * AddCartメソッドを実行
     *
     * @param mixed $request
     *
     * @return mixed
     */
    private function executeAddCartMethod($request)
    {
        $response = $this->addCartMethod
            ->withRequest($request)
            ->send();

        if (!$response->isOk()) {
            throw new \RuntimeException(sprintf('通販Aceの注文事前作成処理に失敗しました: %s', $response->getStatusCode()));
        }

        return $response->getResponse();
    }

    /**
     * DecisionCartメソッドを実行
     *
     * @param mixed $request
     *
     * @return mixed
     */
    private function executeDecisionCartMethod($request)
    {
        $response = $this->decisionCartMethod
            ->withRequest($request)
            ->send();

        if (!$response->isOk()) {
            throw new \RuntimeException(sprintf('通販Aceの注文作成処理に失敗しました: %s', $response->getStatusCode()));
        }

        return $response->getResponse();
    }
}
