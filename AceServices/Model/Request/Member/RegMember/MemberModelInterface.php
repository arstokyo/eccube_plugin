<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient\AceServices\Model\Request\Prm\PrmModelInterface;
use Plugin\AceClient\AceServices\Model\Request;

/**
 * Interface for MemberModel
 * 
 * @author kmorino
 */
interface MemberModelInterface extends PrmModelInterface
{
   /**
     * Set 顧客情報
     * 
     * @param Request\Member\RegMember\MemberModel $member
     * @return self
     */
    public function setMember(MemberPrmModelInterface $member): self;

    /**
     * Get 顧客情報
     * 
     * @return Request\Member\RegMember\MemberPrmModel
     */
    public function getMember(): MemberPrmModelInterface;
}