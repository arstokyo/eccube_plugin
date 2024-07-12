<?php

namespace Plugin\AceClient43\AceServices\AceMethod\Master2;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient43\AceServices\Model\Response\Master2\GetHaisouDayTime\GetHaisouDayTimeResponseModel;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request;

/**
 * Get GetHaisouDayTimeMethod
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class GetHaisouDayTimeMethod extends AceMethodAbstract
{
    /**
     * The End Point of Service.
     */
    private const END_POINT_SERVICE = 'service1.asmx';

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
        return GetHaisouDayTimeResponseModel::class;
    }

    /**
     * @param Request\Master2\GetHaisouDayTime\GetHaisouDayTimeRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }

}