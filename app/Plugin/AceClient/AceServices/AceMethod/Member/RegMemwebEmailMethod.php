<?php

namespace Plugin\AceClient43\AceServices\AceMethod\Member;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Response\Member\RegMemwebEmail\RegMemwebEmailResponseModel;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Method for RegMemwebEmail
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class RegMemwebEmailMethod extends AceMethodAbstract
{
    /**
     * The End Point of Service.
     */
    private const END_POINT_SERVICE = 'service3.asmx';

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
        return RegMemwebEmailResponseModel::class;
    }

    /**
     * @param Request\Member\RegMemwebEmail\RegMemwebEmailRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }
}