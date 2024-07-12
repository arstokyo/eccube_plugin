<?php


namespace Plugin\AceClient43\AceServices\AceMethod\Master;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetOkuriHkTime\GetOkuriHkTimeResponseModel;

/**
 * Method for Get OkuriHkTime
 * 
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */

class GetOkuriHkTimeMethod extends AceMethodAbstract 
{
    /**
     * The end point of service.
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
     * Set the response object.
     * @return string
     */
    protected function setResponseAsObject(): string {
        return GetOkuriHkTimeResponseModel::class;
    }

    /**
     * @param Request\Master\GetOkuriHkTime\GetOkuriHkTimeRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }

}