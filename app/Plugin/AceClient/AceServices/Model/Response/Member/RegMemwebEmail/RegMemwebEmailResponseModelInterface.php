<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\RegMemwebEmail;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface RegMemwebEmail Response Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface RegMemwebEmailResponseModelInterface extends ResponseModelInterface
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
