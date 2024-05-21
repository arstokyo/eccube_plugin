<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\CheckMailAdress;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response\Member\CheckMailAdress\MemberModel;
use Plugin\AceClient\AceServices\Model\Response;

/**
 * Interface GetPointModelReponseInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface CheckMailAdressResponseModelInterface extends ResponseModelInterface
{
    /**
    * Get Member
    *
    * @return Response\Member\CheckMailAdress\MemberModel
    */
    public function getMember():MemberModel;
    /**
    * Set Member
    *
    * @return void
    */
    public function setMember(MemberModel $member): void;
}
