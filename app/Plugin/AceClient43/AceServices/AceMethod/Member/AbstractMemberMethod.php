<?php

namespace Plugin\AceClient43\AceServices\AceMethod\Member;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;

abstract class AbstractMemberMethod extends AceMethodAbstract
{
    protected function getBaseServiceName(): string
    {
        return 'Member';
    }
}
