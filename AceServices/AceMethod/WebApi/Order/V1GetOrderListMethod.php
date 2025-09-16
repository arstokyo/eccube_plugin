<?php

namespace Plugin\AceClient43\AceServices\AceMethod\WebApi\Order;

use Plugin\AceClient43\AceServices\AceMethod\WebApi\AbstractWebApiMethod;
use Plugin\AceClient43\AceServices\Model\Request\WebApi\Order\V1\GetOrderList\V1GetOrderListRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\WebApi\Order\V1\GetOrderList\V1GetOrderListResponseModelInterface;
use Plugin\AceClient43\ApiClient\Client\ClientInterface;

/**
 * WebApi v1: 注文一覧を取得するメソッド（JSON GET）
 *
 * エンドポイント: order/v1/order_list
 * リクエスト/レスポンスのシリアライズ・デシリアライズは services.yaml で設定された
 * SerializerResolver に委譲します。
 */
class V1GetOrderListMethod extends AbstractWebApiMethod
{
    private const END_POINT_SERVICE = 'order/v1/list';

    protected function setEndPointService(): string
    {
        return self::END_POINT_SERVICE;
    }

    protected function getRequestInterface(): string
    {
        return V1GetOrderListRequestModelInterface::class;
    }

    protected function getResponseInterface(): string
    {
        return V1GetOrderListResponseModelInterface::class;
    }

    protected function getApiType(): string
    {
        // REST JSON クライアントを使用
        return ClientInterface::API_TYPE_JSON;
    }

    protected function getRequestFormat(): string
    {
        // JSON フォーマット
        return ClientInterface::FORMAT_JSON;
    }

    protected function getHttpMethod(): string
    {
        return ClientInterface::HTTP_METHOD_GET;
    }
}
