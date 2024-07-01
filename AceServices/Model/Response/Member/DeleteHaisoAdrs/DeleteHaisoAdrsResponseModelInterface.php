<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\DeleteHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response\Member\DeleteHaisoAdrs\MemberModel;
use Plugin\AceClient\AceServices\Model\Response;

/**
 * Interface DeleteHaisoAdrsModelReponseInterface
 *
 * @author kmorino
 */

interface DeleteHaisoAdrsResponseModelInterface extends ResponseModelInterface
{
    /**
    * Get Member
    *
    * @return Response\Member\DeleteHaisoAdrs\MemberModel
    */
    public function getMember():MemberModel;
    /**
    * Set Member
    *
    * @return void
    */
    public function setMember(MemberModel $member): void;
}
