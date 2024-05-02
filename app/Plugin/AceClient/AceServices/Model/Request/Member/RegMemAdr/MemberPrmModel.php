<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Dependency\Person\NmemberInterface;
use Plugin\AceClient\AceServices\Model\Request\Member\Dependency\MemberPrmAbstract;

class MemberPrmModel extends MemberPrmAbstract implements MemberPrmInterface
{
    /** @var NmemberModelInterface $nmember 納品先 */
    private NmemberModelInterface $nmember;

    /**
     * {@inheritDoc}
     */
    public function getNmember(): NmemberInterface
    {
        return $this->nmember;
    
    }

    /**
     * {@inheritDoc}
     */
    public function setNmember(NmemberInterface $nmember): self
    {
        $this->nmember = $nmember;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureValidParameters(): bool
    {
        if (!$this->nmember->getCode()) return false;
        return true;
    }
}