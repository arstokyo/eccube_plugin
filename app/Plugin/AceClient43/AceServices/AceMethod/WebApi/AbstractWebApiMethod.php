<?php

namespace Plugin\AceClient43\AceServices\AceMethod\WebApi;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient43\ApiClient\Client\ClientInterface;

abstract class AbstractWebApiMethod extends AceMethodAbstract
{
    protected function getBaseServiceName(): string
    {
        return 'WebApi';
    }

    protected function getApiType(): string
    {
        return ClientInterface::API_TYPE_JSON;
    }

    protected function getRequestFormat(): string
    {
        return ClientInterface::FORMAT_JSON;
    }

    protected function getHttpMethod(): string
    {
        return ClientInterface::HTTP_METHOD_GET;
    }
}
