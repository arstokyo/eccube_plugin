<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\UpdatePassword;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class UpdatePasswordResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class UpdatePasswordResponseModel extends ResponseModelAbtract implements UpdatePasswordResponseModelInterface
{
    /**
     * Member
     *
     * @var MemberModel $member
     */
    protected MemberModel $member;

    /**
     * @return MemberModel
     */
    function getMember(): MemberModel
    {
        return $this->member;
    }

    /**
    * @param MemberModel $member
    */
    function setMember(MemberModel $member): void
    {
        $this->member = $member;
    }
}