<?php

namespace Plugin\AceClient43\AceServices\AceMethod\WebApi\Member\V1;

use Plugin\AceClient43\AceServices\AceMethod\WebApi\AbstractWebApiMethod;
use Plugin\AceClient43\AceServices\Model\Request\WebApi\Member\V1\CheckCodeAndMail\CheckCodeAndMailRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\WebApi\Member\V1\CheckCodeAndMail\CheckCodeAndMailResponseModelInterface;
use Plugin\AceClient43\ApiClient\Client\ClientInterface;

/**
 * WebApi v1: メールおよびコードの存在を確認するメソッド（JSON GET）
 *
 * エンドポイント: v1/member/CheckCodeAndMail
 * リクエスト/レスポンスのシリアライズ・デシリアライズは services.yaml で設定された
 * SerializerResolver に委譲します。
 */
class CheckCodeAndMailMethod extends AbstractWebApiMethod
{
    private const END_POINT_SERVICE = 'member/v1/exists';

    protected function setEndPointService(): string
    {
        return self::END_POINT_SERVICE;
    }

    protected function getRequestInterface(): string
    {
        return CheckCodeAndMailRequestModelInterface::class;
    }

    protected function getResponseInterface(): string
    {
        return CheckCodeAndMailResponseModelInterface::class;
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
