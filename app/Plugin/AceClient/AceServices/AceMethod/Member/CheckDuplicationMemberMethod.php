<?php

namespace Plugin\AceClient43\AceServices\AceMethod\Member;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Response\Member\CheckDuplicationMember\CheckDuplicationMemberResponseModel;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Method for CheckDuplicationMember
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class CheckDuplicationMemberMethod extends AceMethodAbstract
{
    /**
     * The End Point of Service.
     */
    private const END_POINT_SERVICE = 'service4.asmx';

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
        return CheckDuplicationMemberResponseModel::class;
    }

    /**
     * @param Request\Member\CheckDuplicationMember\CheckDuplicationMemberRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }
}