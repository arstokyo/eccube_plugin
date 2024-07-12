<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelAbstract;

/**
 * Class HanpuPrmModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HanpuPrmModel extends PrmModelAbstract implements HanpuPrmModelInterface
{
    const PRM_NODE_NAME = 'hanpu';

    /**
     * Handen
     *
     * @var Request\Hanpu\AddHanpu\HandenModelInterface $handen
     */
    protected ?HandenModelInterface $handen  = null;

    /**
     * Member
     *
     * @var Request\Hanpu\AddHanpu\MemberModelInterface $member
     */
    protected ?MemberModelInterface $member  = null;

    /**
     * Detail
     *
     * @var Request\Hanpu\AddHanpu\DetailModelInterface $detail
     */
    protected ?DetailModelInterface $detail  = null;

    /**
     * Mailjyuden
     *
     * @var Request\Hanpu\AddHanpu\MailJyudenModelInterface $mailjyuden
     */
    protected ?MailJyudenModelInterface $mailjyuden  = null;

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        // ignore
    }

    /**
     * {@inheritDoc}
     */
    public function fetchPrmNodeName(): string
    {
        return self::PRM_NODE_NAME;
    }

    /**
     * {@inheritDoc}
     */
    public function getMember(): ?MemberModelInterface
    {
        return $this->member;
    }

    /**
    * {@inheritDoc}
    */
    public function setMember(?MemberModelInterface $member): self
    {
        $this->member = $member;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getHanden(): ?HandenModelInterface
    {
        return $this->handen;
    }

    /**
    * {@inheritDoc}
    */
    public function setHanden(?HandenModelInterface $handen): self
    {
        $this->handen = $handen;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMailjyuden(): ?MailJyudenModelInterface
    {
        return $this->mailjyuden;
    }

    /**
    * {@inheritDoc}
    */
    public function setMailjyuden(?MailJyudenModelInterface $mailjyuden): self
    {
        $this->mailjyuden = $mailjyuden;
        return $this;
    }


    /**
     * {@inheritDoc}
     */
    public function getDetail(): ?DetailModelInterface
    {
        return $this->detail;
    }

    /**
    * {@inheritDoc}
    */
    public function setDetail(?DetailModelInterface $detail): self
    {
        $this->detail = $detail;
        return $this;
    }
}