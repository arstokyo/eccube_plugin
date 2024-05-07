<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Dependency\Person\NmemberInterface;
use Plugin\AceClient\AceServices\Model\Request\Member\Dependency\MemberPrmInterface as AbstractInterface;
use Plugin\AceClient\AceServices\Model\Request;

interface MemberPrmInterface extends AbstractInterface
{
    /**
     * Get 納品先
     * 
     * @return Request\Member\RegMemAdr\NmemberModelInterface
     */
    public function getNmember(): NmemberInterface;

    /**
     * Set 納品先
     * 
     * @param Request\Member\RegMemAdr\NmemberModel $nmember
     */
    public function setNmember(NmemberInterface $nmember): self;

}