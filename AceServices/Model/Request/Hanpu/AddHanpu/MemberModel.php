<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu;


class MemberModel implements MemberModelInterface
{
    /** @var JmemberModelInterface|null $jmember 受注先 */
    private ?JmemberModelInterface $jmember = null;

    /** @var NmemberModelInterface|null $nmember 納品先 */
    private ?NmemberModelInterface $nmember = null;

    /** @var SmemberModelInterface|null $smember 請求先 */
    private ?SmemberModelInterface $smember = null;

    /**
     * {@inheritDoc}
     */
    public function getJmember(): ?JmemberModelInterface
    {
        return $this->jmember;

    }

    /**
     * {@inheritDoc}
     */
    public function setJmember(?JmemberModelInterface $jmember): self
    {
        $this->jmember = $jmember;
        return $this;
    }

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
    public function getSmember(): ?SmemberModelInterface
    {
        return $this->smember;

    }

    /**
     * {@inheritDoc}
     */
    public function setSmember(?SmemberModelInterface $smember): self
    {
        $this->smember = $smember;
        return $this;
    }
}