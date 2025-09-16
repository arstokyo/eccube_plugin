<?php

namespace Plugin\AceClient43\AceServices\AceMethod\WebApi;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;

abstract class AbstractWebApiMethod extends AceMethodAbstract
{
    protected function getBaseServiceName(): string
    {
        return 'WebApi';
    }
}
