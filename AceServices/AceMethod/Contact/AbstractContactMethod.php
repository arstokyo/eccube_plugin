<?php

namespace Plugin\AceClient43\AceServices\AceMethod\Contact;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;

abstract class AbstractContactMethod extends AceMethodAbstract
{
    protected function getBaseServiceName(): string
    {
        return 'Contact';
    }
}
