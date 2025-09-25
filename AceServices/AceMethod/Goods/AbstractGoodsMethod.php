<?php

namespace Plugin\AceClient43\AceServices\AceMethod\Goods;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;

abstract class AbstractGoodsMethod extends AceMethodAbstract
{
    protected function getBaseServiceName(): string
    {
        return 'Goods';
    }
}
