<?php

namespace Plugin\AceClient43\AceServices\AceMethod\Hanpu;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Response\Hanpu\DecisionHanpu\DecisionHanpuResponseModel;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

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