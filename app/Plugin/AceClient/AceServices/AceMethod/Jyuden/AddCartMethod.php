<?php

namespace Plugin\AceClient\AceServices\AceMethod\Jyuden;

use Plugin\AceClient\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient\AceServices\Model\Response\Jyuden\AddCartResponseModel;
use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Request;

/**
 * Add Cart Method
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 * @package AceClient\AceServices\AceMethod\Jyuden
 */
class AddCartMethod extends AceMethodAbstract
{
    
    /**
     * The End Point of Service.
     */
    private const END_POINT_SERVICE = 'service2.asmx';

    /**
     * {@inheritDoc}
     *
     */
    protected function setEndPointService(): string
    {
        return self::END_POINT_SERVICE;
    }

    /**
     * {@inheritDoc}
     *
     */
    protected function setResponseAsObject(): string
    {
        return AddCartResponseModel::class;
    }

    /**
     * Set the Request.
     *
     * @param Request\Jyuden\AddCart\AddCartRequestModel $request
     */
    public function withRequest(RequestModelInterface $request): AddCartMethod
    {
        return parent::withRequest($request);
    }

}