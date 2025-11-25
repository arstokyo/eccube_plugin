<?php

namespace Plugin\AceClient43\AceServices\AceMethod\WebApi\Order;

use Plugin\AceClient43\AceServices\AceMethod\WebApi\AbstractWebApiMethod;

/**
 * WebApi v1: 通販Aceの受注番号を取得API
 *
 * エンドポイント: order/v1/ace-order-id
 */
class V1GetAceOrderIdMethod extends AbstractWebApiMethod
{
    private const END_POINT_SERVICE = 'order/v1/ace-order-id';

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
        return 'string';
    }
}
