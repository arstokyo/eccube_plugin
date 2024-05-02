<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Dependency\Person\NmemberInterface;
use Plugin\AceClient\AceServices\Model\Request\Member\Dependency\MemberPrmInterface as AbstractInterface;

interface MemberPrmInterface extends AbstractInterface
{
    /**
     * Get 納品先
     * 
     */
    public function getNmember(): NmemberInterface;

    /**
     * Set 納品先
     * 
     */
    public function setNmember(NmemberInterface $nmember): self;

}