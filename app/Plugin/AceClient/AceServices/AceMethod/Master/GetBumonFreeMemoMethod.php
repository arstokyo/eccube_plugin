<?php

namespace Plugin\AceClient43\AceServices\AceMethod\Master;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetBumonFreeMemo\GetBumonFreeMemoResponseModel;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Method for GetBumonFreeMemo
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class GetBumonFreeMemoMethod extends AceMethodAbstract
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
        return GetBumonFreeMemoResponseModel::class;
    }

    /**
     * @param Request\Master\GetBumonFreeMemo\GetBumonFreeMemoRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }
}