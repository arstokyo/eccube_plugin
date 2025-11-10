<?php

namespace Plugin\AceClient43\AceServices\AceMethod\WebApi\Goods\V1;

use Plugin\AceClient43\AceServices\AceMethod\NonDebugLoggingMethodInterface;
use Plugin\AceClient43\AceServices\AceMethod\WebApi\AbstractWebApiMethod;
use Plugin\AceClient43\AceServices\Model\Request\WebApi\Goods\V1\GoodsItemsTanka\V1GoodsItemsTankaRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GoodsItemsTanka\V1GoodsItemsTankaResponseModelInterface;

/**
 * WebApi v1: 商品単価一覧を取得するメソッド（JSON GET）
 *
 * エンドポイント: goods/v1/list/tanka
 *
 * Note: This method implements NonDebugLoggingMethodInterface to suppress debug logs
 * as it may be called frequently and could clutter logs in production.
 */
class V1GoodsItemsTankaMethod extends AbstractWebApiMethod implements NonDebugLoggingMethodInterface
{
    private const END_POINT_SERVICE = 'goods/v1/items/tanka';

    protected function setEndPointService(): string
    {
        return self::END_POINT_SERVICE;
    }

    protected function getRequestInterface(): string
    {
        return V1GoodsItemsTankaRequestModelInterface::class;
    }

    protected function getResponseInterface(): string
    {
        return V1GoodsItemsTankaResponseModelInterface::class;
    }
}
