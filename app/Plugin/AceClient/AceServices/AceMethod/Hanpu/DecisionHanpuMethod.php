<?php

namespace Plugin\AceClient\AceServices\AceMethod\Hanpu;

use Plugin\AceClient\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Response\Hanpu\DecisionHanpu\DecisionHanpuResponseModel;
use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;

/**
 * Method for DecisionHanpu
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class DecisionHanpuMethod extends AceMethodAbstract
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
        return DecisionHanpuResponseModel::class;
    }

    /**
     * @param Request\Hanpu\DecisionHanpu\DecisionHanpuRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }
}