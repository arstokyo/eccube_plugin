<?php

namespace Plugin\AceClient\AceServices\AceMethod\Member;

use Plugin\AceClient\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs\GetHaisoAdrsResponseModel;
use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;

class GetHaisoAdrsMethod extends AceMethodAbstract
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
     *
     */
    protected function setResponseAsObject(): string
    {
        return GetHaisoAdrsResponseModel::class;
    }

    /**
     * @param Request\Member\GetHaisoAdrs\GetHaisoAdrsRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }

}