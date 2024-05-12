<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Request\Dependency\Prm\PrmModelAbstract;
use Plugin\AceClient\AceServices\Model\Request;

class OrderPrmModel extends PrmModelAbstract implements OrderPrmModelInterface
{
    const PRM_NODE_NAME = 'order';

    /**
     * @var ?MemberOrderModelInterface $member
     */
    private ?MemberOrderModelInterface $member = null;

    /**
     * {@inheritDoc}
     */
    public function setMember(MemberOrderModelInterface $member): self
    {
        $this->member = $member;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMember(): MemberOrderModelInterface
    {
        return $this->member;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
       // not implemented yet
    }

    /**
     * {@inheritDoc}
     */
    public function fetchPrmNodeName(): string
    {
        return self::PRM_NODE_NAME;
    }

}