<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 */

namespace Plugin\AceClient43\Bridge;

use Eccube\Entity\Shipping;
use Plugin\AceClient43\AceServices\AceMethod\Jyuden\AddCartMethod;
use Plugin\AceClient43\AceServices\AceMethod\Jyuden\CreateOrderMethod;
use Plugin\AceClient43\AceServices\AceMethod\Jyuden\DecisionCartMethod;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\CreateOrder\CreateOrderRequestModelInterface;
use Plugin\AceClient43\Bridge\DataConverter\OrderDataConverterInterface;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\OnPreCreateOrderEvent;
use Plugin\AceClient43\Events\PostCreateOrderEvent;
use Plugin\AceClient43\Exception\CouldNotCreateOrderException;

/**
 * 注文関連の処理を行うブリッジクラス
 *
 * - 既存の2段階処理（AddCart -> DecisionCart）を保持
 * - 統合API（CreateOrder）による1回呼び出しの新処理も提供
 */
class OrderBridge extends BaseBridge
{
    use CreateRequestModelTrait;

    private OrderDataConverterInterface $orderDataConverter;

    private AddCartMethod $addCartMethod;

    private DecisionCartMethod $decisionCartMethod;

    /** @var CreateOrderMethod 統合API用メソッド */
    private CreateOrderMethod $createOrderMethod;

    public function __construct(
        OrderDataConverterInterface $orderDataConverter,
        AddCartMethod $addCartMethod,
        DecisionCartMethod $decisionCartMethod,
        CreateOrderMethod $createOrderMethod,
    ) {
        $this->orderDataConverter = $orderDataConverter;
        $this->addCartMethod = $addCartMethod;
        $this->decisionCartMethod = $decisionCartMethod;
        $this->createOrderMethod = $createOrderMethod;
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

            // エラーチェック（AddCart/DecisionCart それぞれのメッセージも考慮）
            if ($this->hasErrorInCreateOrderResponse($apiResponse)) {
                $errors = $this->extractErrorMessages($apiResponse);
                throw new CouldNotCreateOrderException('通販Aceの注文作成に失敗しました: '.implode(' / ', $errors));
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
            throw new CouldNotCreateOrderException('通販Aceの注文作成に失敗しました。', $e);
        }
    }

    /**
     * 統合API CreateOrder を実行します。
     *
     * @param CreateOrderRequestModelInterface $request
     *
     * @return mixed レスポンスモデル
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

    /**
     * 統合APIレスポンスにエラーが含まれているか判定します。
     */
    private function hasErrorInCreateOrderResponse($response): bool
    {
        if (!$response) {
            return true;
        }

        // AddCart/DecisionCart の個別メッセージを直接確認
        $add1 = (string) $response->getAddCartMessage1();
        $add2 = (string) $response->getAddCartMessage2();
        $dec1 = (string) $response->getDecisionCartMessage1();
        $dec2 = (string) $response->getDecisionCartMessage2();

        if ($add1 !== '' || $add2 !== '' || $dec1 !== '' || $dec2 !== '') {
            return true;
        }

        // 最終メッセージ（DecisionCart 側のメッセージ）も確認
        $msg = $response->getOrder()->getMessage();
        if ($msg) {
            $m1 = (string) $msg->getMessage1();
            $m2 = (string) $msg->getMessage2();

            return $m1 !== '' || $m2 !== '';
        }

        return false;
    }

    /**
     * 統合APIレスポンスからエラーメッセージを抽出します。
     *
     * @return string[]
     */
    private function extractErrorMessages($response): array
    {
        $messages = [];

        $add1 = (string) $response->getAddCartMessage1();
        $add2 = (string) $response->getAddCartMessage2();
        $dec1 = (string) $response->getDecisionCartMessage1();
        $dec2 = (string) $response->getDecisionCartMessage2();

        if ($add1 !== '') {
            $messages[] = 'AddCart: '.$add1;
        }
        if ($add2 !== '') {
            $messages[] = 'AddCart: '.$add2;
        }
        if ($dec1 !== '') {
            $messages[] = 'DecisionCart: '.$dec1;
        }
        if ($dec2 !== '') {
            $messages[] = 'DecisionCart: '.$dec2;
        }

        $msg = $response->getOrder()->getMessage();
        if ($msg) {
            $m1 = (string) $msg->getMessage1();
            $m2 = (string) $msg->getMessage2();
            if ($m1 !== '') {
                $messages[] = $m1;
            }
            if ($m2 !== '') {
                $messages[] = $m2;
            }
        }

        return $messages ?: ['不明なエラーが発生しました'];
    }
}
