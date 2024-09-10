<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Request\Prm\PrmModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;

class OrderPrmModel extends PrmModelAbstract implements OrderPrmModelInterface
{
    const PRM_NODE_NAME = 'order';

    /**
     * @var ?MemberOrderModelInterface $member
     */
    private ?MemberOrderModelInterface $member = null;

    /**
     * @var ?JyudenModelInterface $jyuden
     */
    private ?JyudenModelInterface $jyuden = null;

    /**
     * @var ?DetailModelInterface $detail
     */
    private ?DetailModelInterface $detail = null;

    /**
     * @var ?MailJyudenModel $mailjyuden
     */
    private ?MailJyudenModel $mailjyuden = null;

    /**
     * {@inheritDoc}
     */
    public function setMember(?MemberOrderModelInterface $member): self
    {
        $this->member = $member;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMember(): ?MemberOrderModelInterface
    {
        return $this->member;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyuden(?JyudenModelInterface $jyuden): self
    {
        $this->jyuden = $jyuden;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getJyuden(): ?JyudenModelInterface
    {
        return $this->jyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function setDetail(?DetailModelInterface $detail): self
    {
        $this->detail = $detail;
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
    public function setMailjyuden(?MailJyudenModel $mailjyuden): self
    {
        $this->mailjyuden = $mailjyuden;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMailjyuden(): ?MailJyudenModel
    {
        return $this->mailjyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {

        if (empty($this->detail)) {
            throw new MissingRequestParameterException($this->compilePropertyName('detail'));
        }

        if (empty($this->detail->getJyumei())) {
            throw new MissingRequestParameterException($this->compilePropertyName('detail.jyumei'));
        }

        for ($i = 0; $i < count($this->detail->getJyumei()); $i++) {
            $jyumei = $this->detail->getJyumei()[$i];
            if (empty($jyumei->getGcode())) {
                throw new MissingRequestParameterException($this->compilePropertyName(sprintf('detail.jyumei[%d].gcode', $i)));
            }

            if (empty($jyumei->getSuu())) {
                throw new MissingRequestParameterException($this->compilePropertyName(sprintf('detail.jyumei[%d].suu', $i)));
            }

            if (null === $jyumei->getTanka()) {
                throw new MissingRequestParameterException($this->compilePropertyName(sprintf('detail.jyumei[%d].tanka', $i)));
            }
        }

    }

    /**
     * {@inheritDoc}
     */
    public function fetchPrmNodeName(): string
    {
        return self::PRM_NODE_NAME;
    }

}