<?php

namespace Plugin\AceClient\AceServices\AceMethod\Master;

use Plugin\AceClient\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Response\Master\GetId\GetIdResponseModel;
use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\ApiClient\Response\ResponseInterface;

/**
 * Method for GetId
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class GetIdMethod extends AceMethodAbstract
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
        return GetIdResponseModel::class;
    }

    /**
     * @param Request\Master\GetHktime\GetHktimeRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }

    /**
     * {@inheritDoc}
     */
    public function send(): ResponseInterface
    {
        if (!$this->assistant->getApiClient()->getMetadata()->getData()) {
            $this->withRequest(new Request\Master\GetId\GetIdRequestModel);
        }
        return parent::send();
    }
}