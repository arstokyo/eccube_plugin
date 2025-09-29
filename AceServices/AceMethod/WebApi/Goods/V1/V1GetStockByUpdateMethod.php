<?php

namespace Plugin\AceClient43\AceServices\AceMethod\WebApi\Goods\V1;

use Plugin\AceClient43\AceServices\AceMethod\WebApi\AbstractWebApiMethod;
use Plugin\AceClient43\AceServices\Model\Request\WebApi\Goods\V1\GetStockByUpdate\V1GetStockByUpdateRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GetStockByUpdate\V1GetStockByUpdateResponseModelInterface;
use Plugin\AceClient43\ApiClient\Client\ClientInterface;

/**
 * WebApi v1: 更新日時で在庫を取得するメソッド（JSON GET）
 *
 * エンドポイント: goods/v1/stock_by_update
 * リクエスト/レスポンスのシリアライズ・デシリアライズは services.yaml で設定された
 * SerializerResolver に委譲します。
 */
class V1GetStockByUpdateMethod extends AbstractWebApiMethod
{
    private const END_POINT_SERVICE = 'goods/v1/stock_by_update';

    protected function setEndPointService(): string
    {
        return self::END_POINT_SERVICE;
    }

    protected function getRequestInterface(): string
    {
        return V1GetStockByUpdateRequestModelInterface::class;
    }

    protected function getResponseInterface(): string
    {
        return V1GetStockByUpdateResponseModelInterface::class;
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
