<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\RegMember;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/*
 * Class for RegMemberResponseModel
 * 
 * @author kmorino
 */
class RegMemberResponseModel extends ResponseModelAbtract implements RegMemberResponseModelInterface
{
    /** @var MemberModel $member */
    private MemberModel $member;

    /**
     * {@inheritDoc}
     */
    public function getMember(): MemberModel
    {
        return $this->member;
    }

    /**
     * {@inheritDoc}
     */
    public function setMember(MemberModel $member): void
    {
        $this->member = $member;
    }
}
