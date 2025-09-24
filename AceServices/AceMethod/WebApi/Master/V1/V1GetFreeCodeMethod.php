<?php

namespace Plugin\AceClient43\AceServices\AceMethod\WebApi\Master\V1;

use Plugin\AceClient43\AceServices\AceMethod\WebApi\AbstractWebApiMethod;
use Plugin\AceClient43\AceServices\Model\Request\WebApi\Master\V1\GetFreeCode\V1GetFreeCodeRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\WebApi\Master\V1\GetFreeCode\V1GetFreeCodeResponseModelInterface;

class V1GetFreeCodeMethod extends AbstractWebApiMethod
{
    private const END_POINT_SERVICE = 'master/v1/freecode';

    protected function setEndPointService(): string
    {
        return self::END_POINT_SERVICE;
    }

    protected function getRequestInterface(): string
    {
        return V1GetFreeCodeRequestModelInterface::class;
    }

    protected function getResponseInterface(): string
    {
        return V1GetFreeCodeResponseModelInterface::class;
    }
}
