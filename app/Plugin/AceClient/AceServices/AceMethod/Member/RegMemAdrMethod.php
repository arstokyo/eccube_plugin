<?php

namespace Plugin\AceClient\AceServices\AceMethod\Member;

use Plugin\AceClient\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient\AceServices\Model\Response\Member\RegMemAdr\RegMemAdrResponseModel;
use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Request;

/**
 * Method for RegmemAdr
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class RegMemAdrMethod extends AceMethodAbstract
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
        return RegMemAdrResponseModel::class;
    }

    /**
     * @param Request\Member\RegMemAdr\RegMemAdrRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }
}