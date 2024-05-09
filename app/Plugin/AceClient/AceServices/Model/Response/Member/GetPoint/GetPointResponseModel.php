<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetPoint;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;
use Plugin\AceClient\AceServices\Model\Response\Member\GetPoint\MemberModel;
use Plugin\AceClient\AceServices\Model\Response;

/**
 * Class GetPointRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class GetPointResponseModel extends ResponseModelAbtract implements GetPointResponseModelInterface
{
    /**
     * Member
     *
     * @var MemberModel $member
     */
    protected MemberModel $member;

    /**
     * @return Response\Member\GetPoint\MemberModel
     */
    function getMember(): MemberModel
    {
        return $this->member;
    }

    /**
    * @param Response\Member\GetPoint\MemberModel $member
    */
    function setMember(MemberModel $member): void
    {
        $this->member = $member;
    }
}