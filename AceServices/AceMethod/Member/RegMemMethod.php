<?php

namespace Plugin\AceClient\AceServices\AceMethod\Member;

use Plugin\AceClient\AceServices\AceMethod\AceMethodAbstract;

class RegMemMethod extends AceMethodAbstract
{
    private const METHOD_REQUEST_NAME = 'RegMem';

    /**
     * {@inheritDoc}
     *
     */
    protected function setRequestMethodName(): string
    {
        return self::METHOD_REQUEST_NAME;
    }
}