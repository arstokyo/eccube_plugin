<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetMemberName;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response\Member\GetMemberName\MemberModel;

/**
 * Interface GetMemberNameResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface GetMemberNameResponseModelInterface extends ResponseModelInterface
{
    /**
    * Get Member
    *
    * @return MemberModel
    */
    public function getMember():MemberModel;
    /**
    * Set Member
    *
    * @return void
    */
    public function setMember(MemberModel $member): void;
}
