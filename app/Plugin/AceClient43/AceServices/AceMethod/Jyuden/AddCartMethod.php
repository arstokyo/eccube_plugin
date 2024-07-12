<?php

namespace Plugin\AceClient43\AceServices\AceMethod\Jyuden;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\AddCartResponseModel;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request;

/**
 * Add Cart Method
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AddCartMethod extends AceMethodAbstract
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
        return AddCartResponseModel::class;
    }

    /**
     * @param Request\Jyuden\AddCart\AddCartRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): AddCartMethod
    {
        return parent::withRequest($requestModel);
    }

}