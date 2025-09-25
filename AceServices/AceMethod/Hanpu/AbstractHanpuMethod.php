<?php

namespace Plugin\AceClient43\AceServices\AceMethod\Hanpu;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;

abstract class AbstractHanpuMethod extends AceMethodAbstract
{
    protected function getBaseServiceName(): string
    {
        return 'Hanpu';
    }
}
