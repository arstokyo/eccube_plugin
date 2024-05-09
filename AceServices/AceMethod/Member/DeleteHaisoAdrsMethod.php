<?php

namespace Plugin\AceClient\AceServices\AceMethod\Member;

use Plugin\AceClient\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Response\Member\DeleteHaisoAdrs\DeleteHaisoAdrsResponseModel;
use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;

/**
 * Method for DeleteHaisoAdrs
 *
 * @author kmorino
 */
class DeleteHaisoAdrsMethod extends AceMethodAbstract
{
    /**
     * The End Point of Service.
     */
    private const END_POINT_SERVICE = 'service2.asmx';

    /**
     * {@inheritDoc}
     */
    protected function setEndPointService(): string
    {
        return self::END_POINT_SERVICE;
    }

    /**
     * {@inheritDoc}
     */
    protected function setResponseAsObject(): string
    {
        return DeleteHaisoAdrsResponseModel::class;
    }

    /**
     * @param Request\Member\DeleteHaisoAdrs\DeleteHaisoAdrsRequestModel $request
     */
    public function withRequest(RequestModelInterface $request): self
    {
        return parent::withRequest($request);
    }
}