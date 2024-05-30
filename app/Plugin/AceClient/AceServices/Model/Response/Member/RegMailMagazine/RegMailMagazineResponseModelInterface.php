<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\RegMailMagazine;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface RegMailMagazine Response Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface RegMailMagazineResponseModelInterface extends ResponseModelInterface
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
