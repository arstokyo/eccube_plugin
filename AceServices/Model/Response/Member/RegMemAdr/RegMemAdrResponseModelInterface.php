<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response;

interface RegMemAdrResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get Member
     * 
     * @return Response\Member\RegMemAdr\MemberModel
     */
    public function getMember(): MemberModel;

    /**
     * Set Member
     * 
     * @param Response\Member\RegMemAdr\MemberModel $member
     * @return void
     */
    public function setMember(MemberModel $member): void;
}