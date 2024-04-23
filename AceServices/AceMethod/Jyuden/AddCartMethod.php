<?php

namespace Plugin\AceClient\AceServices\AceMethod\Jyuden;

use Plugin\AceClient\AceServices\AceMethod\AceMethodAbstract;

class AddCartMethod extends AceMethodAbstract
{

    private const METHOD_REQUEST_NAME = 'AddCart';

    /**
     * {@inheritDoc}
     *
     */
    protected function setRequestMethodName(): string
    {
        return self::METHOD_REQUEST_NAME;
    }

}