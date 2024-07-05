<?php

namespace Plugin\AceClient\AceServices\AceMethod\Hanpu;

use Plugin\AceClient\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Response\Hanpu\AddHanpuNext\AddHanpuNextResponseModel;
use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;

/**
 * Method for AddHanpuNext
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class AddHanpuNextMethod extends AceMethodAbstract
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
        return AddHanpuNextResponseModel::class;
    }

    /**
     * @param Request\Hanpu\AddHanpuNext\AddHanpuNextRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }
}