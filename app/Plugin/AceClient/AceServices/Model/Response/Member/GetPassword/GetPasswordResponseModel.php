<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetPassword;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetPasswordResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class GetPasswordResponseModel extends ResponseModelAbtract implements GetPasswordResponseModelInterface
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