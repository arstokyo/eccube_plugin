<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\UpdateTaikai;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface UpdateTaikai Response Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface UpdateTaikaiResponseModelInterface extends ResponseModelInterface
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
