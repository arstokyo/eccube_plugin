<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\DeleteHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Response\Member\DeleteHaisoAdrs\DeleteHaisoAdrsReponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response\Member\DeleteHaisoAdrs\MemberModel;
use Plugin\AceClient\AceServices\Model\Response;

/**
 * Class DeleteHaisoAdrsRequestModel
 *
 * @author kmorino
 */

class DeleteHaisoAdrsResponseModel implements DeleteHaisoAdrsResponseModelInterface
{
    /**
     * Member
     *
     * @var MemberModel $member
     */
    protected MemberModel $member;

    /**
     * @return Response\Member\DeleteHaisoAdrs\MemberModel
     */
    function getMember(): MemberModel
    {
        return $this->member;
    }

    /**
    * @param Response\Member\DeleteHaisoAdrs\MemberModel $member
    */
    function setMember(MemberModel $member): void
    {
        $this->member = $member;
    }
}