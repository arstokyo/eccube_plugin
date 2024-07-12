<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetPoint;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetPoint\MemberModel;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Interface GetPointModelReponseInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface GetPointResponseModelInterface extends ResponseModelInterface
{
    /**
    * Get Member
    *
    * @return Response\Member\GetPoint\MemberModel
    */
    public function getMember():MemberModel;
    /**
    * Set Member
    *
    * @return void
    */
    public function setMember(MemberModel $member): void;
}
