<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

interface RegMemberResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get Member
     * 
     * @return Response\Member\RegMember\MemberModel
     */
    public function getMember(): MemberModel;

    /**
     * Set Member
     * 
     * @param Response\Member\RegMember\MemberModel $member
     * @return void
     */
    public function setMember(MemberModel $member): void;
}