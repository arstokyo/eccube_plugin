<?php

namespace Plugin\AceClient\AceServices\AceMethod\Hanpu;

use Plugin\AceClient\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Response\Hanpu\AddHanpu\AddHanpuResponseModel;
use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;

/**
 * Method for AddHanpu
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class AddHanpuMethod extends AceMethodAbstract
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
        return AddHanpuResponseModel::class;
    }

    /**
     * @param Request\Hanpu\AddHanpu\AddHanpuRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }
}