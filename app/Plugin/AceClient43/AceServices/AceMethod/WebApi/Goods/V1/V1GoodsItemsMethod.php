<?php

namespace Plugin\AceClient43\AceServices\AceMethod\WebApi\Goods\V1;

use Plugin\AceClient43\AceServices\AceMethod\WebApi\AbstractWebApiMethod;
use Plugin\AceClient43\AceServices\Model\Request\WebApi\Goods\V1\GoodsItems\V1GoodsItemsRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GoodsItems\V1GoodsItemsResponseModelInterface;

/**
 * WebApi v1: 商品一覧を取得するメソッド（JSON GET）
 *
 * エンドポイント: goods/v1/list
 */
class V1GoodsItemsMethod extends AbstractWebApiMethod
{
    private const END_POINT_SERVICE = 'goods/v1/items';

    protected function setEndPointService(): string
    {
        return self::END_POINT_SERVICE;
    }

    protected function getRequestInterface(): string
    {
        return V1GoodsItemsRequestModelInterface::class;
    }

    protected function getResponseInterface(): string
    {
        return V1GoodsItemsResponseModelInterface::class;
    }
}
