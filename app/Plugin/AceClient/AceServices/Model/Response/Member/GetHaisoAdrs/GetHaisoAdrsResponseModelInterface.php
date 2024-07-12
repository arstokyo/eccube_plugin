<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetHaisoAdrs;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetHaisoAdrs\MemberModel;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Interface GetHaisoAdrsModelResponseInterface
 *
 * @author kmorino
 */

interface GetHaisoAdrsResponseModelInterface extends ResponseModelInterface
{
    /**
    * Get Member
    *
    * @return Response\Member\GetHaisoAdrs\MemberModel
    */
    public function getMember():MemberModel;
    /**
    * Set Member
    *
    * @return self
    */
    public function setMember(MemberModel $member): self;
}
