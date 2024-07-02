<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\CheckDuplicationMember;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class CheckDuplicationMemberResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class CheckDuplicationMemberResponseModel extends ResponseModelAbtract implements CheckDuplicationMemberResponseModelInterface
{
    /**
     * @var MemberModel $member
     */
    protected MemberModel $member;

    /**
     * {@inheritDoc}
     */
    public function getMember(): MemberModelInterface
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