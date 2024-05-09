<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\DeleteHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Response\Depedency\MemberModelResponseInterface as ParentMemberModelResponseInterface;
use Plugin\AceClient\AceServices\Model\Response\Member\DeleteHaisoAdrs\NmemberModel;
use Plugin\AceClient\AceServices\Model\Response;


/**
 * Interface MemberModelInterface
 *
 * @author kmorino
 */

interface MemberModelInterface extends ParentMemberModelResponseInterface
{
    /**
    * Get Point
    *
    * @return ?Response\Member\DeleteHaisoAdrs\NmemberModel
    */
    public function getNmember(): ?NmemberModel;

    /**
     * Set Point
     *
     * @param ?Response\Member\DeleteHaisoAdrs\NmemberModel $Nmember
     * @return void
     */
    public function setNmember(?NmemberModel $Nmember): void;
}