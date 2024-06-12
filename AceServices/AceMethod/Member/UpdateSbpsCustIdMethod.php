<?php

namespace Plugin\AceClient\AceServices\AceMethod\Member;

use Plugin\AceClient\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Response\Member\UpdateSbpsCustId\GetSbpsCustIdResponseModel;
use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;

/**
 * Method for UpdateSbpsCustId
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class UpdateSbpsCustIdMethod extends AceMethodAbstract
{
    /**
     * The End Point of Service.
     */
    private const END_POINT_SERVICE = 'service4.asmx';

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
        return GetSbpsCustIdResponseModel::class;
    }

    /**
     * @param Request\Member\UpdateSbpsCustId\UpdateSbpsCustIdRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }
}