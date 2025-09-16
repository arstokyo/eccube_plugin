<?php

namespace Plugin\AceClient43\AceServices\AceMethod\Master;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;

abstract class AbstractMasterMethod extends AceMethodAbstract
{
    protected function getBaseServiceName(): string
    {
        return 'Master';
    }
}
