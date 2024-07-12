<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\DeleteHaisoAdrs;

use Plugin\AceClient43\AceServices\Model\Response\Member\DeleteHaisoAdrs\DeleteHaisoAdrsReponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\DeleteHaisoAdrs\MemberModel;
use Plugin\AceClient43\AceServices\Model\Response;
use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class DeleteHaisoAdrsRequestModel
 *
 * @author kmorino
 */

class DeleteHaisoAdrsResponseModel extends ResponseModelAbtract implements DeleteHaisoAdrsResponseModelInterface
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