<?php

namespace Plugin\AceClient43\AceServices\AceMethod\Member;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Response\Member\CheckMailAdress\CheckMailAdressResponseModel;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Method for CheckMailAdress
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class CheckMailAdressMethod extends AceMethodAbstract
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
        return CheckMailAdressResponseModel::class;
    }

    /**
     * @param Request\Member\CheckMailAdress\CheckMailAdressRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }
}