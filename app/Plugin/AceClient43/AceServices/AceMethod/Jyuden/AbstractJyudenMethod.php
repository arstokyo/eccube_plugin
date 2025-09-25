<?php

namespace Plugin\AceClient43\AceServices\AceMethod\Jyuden;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;

abstract class AbstractJyudenMethod extends AceMethodAbstract
{
    protected function getBaseServiceName(): string
    {
        return 'Jyuden';
    }
}
