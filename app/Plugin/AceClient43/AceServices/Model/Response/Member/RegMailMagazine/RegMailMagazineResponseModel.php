<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\RegMailMagazine;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class RegMailMagazineResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class RegMailMagazineResponseModel extends ResponseModelAbtract implements RegMailMagazineResponseModelInterface
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