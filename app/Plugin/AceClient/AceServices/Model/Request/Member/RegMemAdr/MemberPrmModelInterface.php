<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Dependency\Person\Nmember\NmemberModelInterface;
use Plugin\AceClient\AceServices\Model\Request\Dependency\Prm\PrmModelInterface;
use Plugin\AceClient\AceServices\Model\Request;

interface MemberPrmModelInterface extends PrmModelInterface
{
    /**
     * Get 納品先
     * 
     * @return Request\Member\RegMemAdr\NmemberModelInterface|null
     */
    public function getNmember(): ?NmemberModelInterface;

    /**
     * Set 納品先
     * 
     * @param Request\Member\RegMemAdr\NmemberModel|null $nmember
     * @return self
     */
    public function setNmember(?NmemberModelInterface $nmember): self;

}