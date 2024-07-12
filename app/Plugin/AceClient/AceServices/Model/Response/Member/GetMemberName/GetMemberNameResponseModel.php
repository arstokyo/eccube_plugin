<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberName;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetMemberNameResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class GetMemberNameResponseModel extends ResponseModelAbtract implements GetMemberNameResponseModelInterface
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