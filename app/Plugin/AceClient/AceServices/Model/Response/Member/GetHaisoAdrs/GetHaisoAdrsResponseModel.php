<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Response;

/**
 * Class GetHaisoAdrsRequestModel
 *
 * @author kmorino
 */

class GetHaisoAdrsResponseModel implements GetHaisoAdrsResponseModelInterface
{

    /**
     * Member
     *
     * @var MemberModel $member
     */
    protected MemberModel $member;

    /**
     * @return Response\Member\getHaisoAdrs\MemberModel
     */
    function getMember(): MemberModel
    {
        return $this->member;
    }

    /**
    * @param Response\Member\getHaisoAdrs\MemberModel $member
    */
    function setMember(MemberModel $member): void
    {
        $this->member = $member;
    }

}