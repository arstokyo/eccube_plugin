<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Dependency\Person;

class MemberOrderModel implements MemberOrderModelInterface
{

    /**
     * @var ?Person\Nmember\NmemberModelInterface $jmember
     */
    private ?Person\Jmember\JmemberModelInterface $jmember = null;

    /**
     * @var ?Person\Nmember\NmemberModelInterface $nmember
     */
    private ?Person\Nmember\NmemberModelInterface $nmember = null;

    /**
     * @var ?Person\Smember\SmemberModelInterface $smember
     */
    private ?Person\Smember\SmemberModelInterface $smember = null;

    /**
     * {@inheritDoc}
     */
    public function setJmember(?Person\Jmember\JmemberModelInterface $jmember): self
    {
        $this->jmember = $jmember;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setNmember(?Person\Nmember\NmemberModelInterface $nmember): self
    {
        $this->nmember = $nmember;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setSmember(?Person\Smember\SmemberModelInterface  $smember): self
    {
        $this->smember = $smember;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getJmember(): ?Person\Jmember\JmemberModelInterface
    {
        return $this->jmember;
    }
    /**
     * {@inheritDoc}
     */
    public function getNmember(): ?Person\Nmember\NmemberModelInterface
    {
        return $this->nmember;
    }

    /**
     * {@inheritDoc}
     */
    public function getSmember(): ?Person\Smember\SmemberModelInterface
    {
        return $this->smember;
    }

}

