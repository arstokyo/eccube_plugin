<?php

namespace Plugin\AceClient\AceServices\AceMethod\Member;

use Plugin\AceClient\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient\AceServices\Model\Response\Member\RegMemResponseModel;

class RegMemMethod extends AceMethodAbstract
{
    private const END_POINT_SERVICE = 'RegMem';

    /**
     * {@inheritDoc}
     *
     */
    protected function setResponseAsObject(): string
    {
        return RegMemResponseModel::class;
    }

    /**
     * {@inheritDoc}
     *
     */
    protected function setEndPointService(): string
    {
        return self::END_POINT_SERVICE;
    }
}