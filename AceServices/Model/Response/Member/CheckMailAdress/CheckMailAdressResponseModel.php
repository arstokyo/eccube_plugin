<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\CheckMailAdress;

use Plugin\AceClient\AceServices\Model\Response\Member\CheckMailAdress\CheckMailAdressResponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response\Member\CheckMailAdress\MemberModel;
use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;
use Plugin\AceClient\AceServices\Model\Response;

/**
 * Class CheckMailAdressReponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class CheckMailAdressResponseModel extends ResponseModelAbtract implements CheckMailAdressResponseModelInterface
{
    /**
     * Member
     *
     * @var MemberModel $member
     */
    protected MemberModel $member;

    /**
     * @return Response\Member\CheckMailAdress\MemberModel
     */
    function getMember(): MemberModel
    {
        return $this->member;
    }

    /**
    * @param Response\Member\CheckMailAdress\MemberModel $member
    */
    function setMember(MemberModel $member): void
    {
        $this->member = $member;
    }
}