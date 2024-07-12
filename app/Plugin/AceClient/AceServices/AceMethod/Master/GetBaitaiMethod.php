<?php

namespace Plugin\AceClient43\AceServices\AceMethod\Master;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetBaitai\GetBaitaiResponseModel;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Method for GetBaitai
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class GetBaitaiMethod extends AceMethodAbstract
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
        return GetBaitaiResponseModel::class;
    }

    /**
     * @param Request\Master\GetBaitai\GetBaitaiRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }
}