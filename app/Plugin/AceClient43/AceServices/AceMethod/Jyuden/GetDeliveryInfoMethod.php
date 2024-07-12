<?php

namespace Plugin\AceClient43\AceServices\AceMethod\Jyuden;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\GetDeliveryInfo\GetDeliveryInfoResponseModel;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request;

/**
 * Method for GetDeliveryInfo
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class GetDeliveryInfoMethod extends AceMethodAbstract
{
    /**
     * The End Point of Service.
     */
    private const END_POINT_SERVICE = 'AceServiceDelivery.asmx';

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
        return GetDeliveryInfoResponseModel::class;
    }

    /**
     * @param Request\Jyuden\GetDeliveryInfo\GetDeliveryInfoRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }

}