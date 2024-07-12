<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\UpdatePassword;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface UpdatePassword Response Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface UpdatePasswordResponseModelInterface extends ResponseModelInterface
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
