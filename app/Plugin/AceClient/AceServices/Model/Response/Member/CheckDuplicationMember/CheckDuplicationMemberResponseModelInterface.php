<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\CheckDuplicationMember;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response;

/**
 * Interface for CheckDuplicationMemberResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface CheckDuplicationMemberResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get Member
     *
     * @return Response\Member\CheckDuplicationMember\MemberModelInterface
     */
    public function getMember(): MemberModelInterface;

    /**
     * Set Member
     *
     * @param Response\Member\CheckDuplicationMember\MemberModel $member
     */
    public function setMember(MemberModel $member): void;
}