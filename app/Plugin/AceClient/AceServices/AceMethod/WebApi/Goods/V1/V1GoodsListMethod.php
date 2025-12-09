<?php

namespace Plugin\AceClient43\AceServices\AceMethod\WebApi\Goods\V1;

use Plugin\AceClient43\AceServices\AceMethod\NonDebugLoggingMethodInterface;
use Plugin\AceClient43\AceServices\AceMethod\WebApi\AbstractWebApiMethod;
use Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GoodsList\V1GoodsListResponseModelInterface;

/**
 * WebApi v1: 商品単一覧を取得するメソッド（JSON GET）
 *
 * エンドポイント: goods/v1/list
 */
class V1GoodsListMethod extends AbstractWebApiMethod implements NonDebugLoggingMethodInterface
{
    private const END_POINT_SERVICE = 'goods/v1/list';

    protected function setEndPointService(): string
    {
        return self::END_POINT_SERVICE;
    }

    protected function getRequestInterface(): string
    {
        return 'array';
    }

    protected function getResponseInterface(): string
    {
        return V1GoodsListResponseModelInterface::class;
    }
}
