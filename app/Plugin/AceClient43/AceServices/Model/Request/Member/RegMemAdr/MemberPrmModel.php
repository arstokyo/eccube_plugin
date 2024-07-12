<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember\NmemberModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

class MemberPrmModel extends PrmModelAbstract implements MemberPrmModelInterface
{
    const PRM_NODE_NAME = 'member';

    /** @var NmemberModel|null $nmember 納品先 */
    private ?NmemberModelInterface $nmember = null;

    /**
     * {@inheritDoc}
     */
    public function getNmember(): ?NmemberModelInterface
    {
        return $this->nmember;
    
    }

    /**
     * {@inheritDoc}
     */
    public function setNmember(?NmemberModelInterface $nmember): self
    {
        $this->nmember = $nmember;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->nmember) { throw new MissingRequestParameterException($this->compilePropertyName('nmember')) ;};
        if (!$this->nmember->getCode()) { throw new MissingRequestParameterException($this->compilePropertyName('nmember.code')) ;};
    }

    /**
     * {@inheritDoc}
     */
    public function fetchPrmNodeName(): string
    {
        return self::PRM_NODE_NAME;
    }
}