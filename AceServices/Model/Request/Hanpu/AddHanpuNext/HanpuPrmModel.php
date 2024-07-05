<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpuNext;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Prm\PrmModelAbstract;

/**
 * Class HanpuPrmModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class HanpuPrmModel extends PrmModelAbstract implements HanpuPrmModelInterface
{
    const PRM_NODE_NAME = 'hanpu';

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
     * Member
     *
     * @var Request\Hanpu\AddHanpuNext\MemberModel $member
     */
    protected ?MemberModel $member  = null;

    /**
     * {@inheritDoc}
     */
    function getMember(): ?MemberModel
    {
        return $this->member;
    }

    /**
    * {@inheritDoc}
    */
    function setMember(?MemberModel $member): self
    {
        $this->member = $member;
        return $this;
    }

    /**
     * Handen
     *
     * @var Request\Hanpu\AddHanpuNext\HandenModel $handen
     */
    protected ?HandenModel $handen  = null;

    /**
     * {@inheritDoc}
     */
    function getHanden(): ?HandenModel
    {
        return $this->handen;
    }

    /**
    * {@inheritDoc}
    */
    function setHanden(?HandenModel $handen): self
    {
        $this->handen = $handen;
        return $this;
    }

    /**
     * Mailjyuden
     *
     * @var Request\Hanpu\AddHanpuNext\MailjyudenModel $mailjyuden
     */
    protected ?MailjyudenModel $mailjyuden  = null;

    /**
     * {@inheritDoc}
     */
    function getMailjyuden(): ?MailjyudenModel
    {
        return $this->mailjyuden;
    }

    /**
    * {@inheritDoc}
    */
    function setMailjyuden(?MailjyudenModel $mailjyuden): self
    {
        $this->mailjyuden = $mailjyuden;
        return $this;
    }

    /**
     * Detail
     *
     * @var Request\Hanpu\AddHanpuNext\DetailModel $detail
     */
    protected ?DetailModel $detail  = null;

    /**
     * {@inheritDoc}
     */
    function getDetail(): ?DetailModel
    {
        return $this->detail;
    }

    /**
    * {@inheritDoc}
    */
    function setDetail(?DetailModel $detail): self
    {
        $this->detail = $detail;
        return $this;
    }
}