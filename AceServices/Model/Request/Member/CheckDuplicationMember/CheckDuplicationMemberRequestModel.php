<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\CheckDuplicationMember;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\Exception\MissingRequestParameterException;

class CheckDuplicationMemberRequestModel extends Request\RequestModelAbstract implements CheckDuplicationMemberRequestModelInterface
{
    const XML_NODE_NAME = 'checkDuplicationMember';


    /** @var MemberPrmModel $prm Prm */
    private MemberPrmModel $prm;

    /** @var ?int $syid 通販AceID */
    protected ?int $syid = null;

    /**
     * {@inheritDoc}
     */
    public function getSyid(): ?int
    {
        return $this->syid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSyid(?int $syid)
    {
        $this->syid = $syid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPrm(): MemberPrmModel
    {
        return $this->prm;
    }

    /**
     * {@inheritDoc}
     */
    public function setPrm(MemberPrmModel $prm): self
    {
        $this->prm = $prm;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (empty($this->syid)) { throw new MissingRequestParameterException($this->compilePropertyName('syid')); };
        if (empty($this->prm))  { throw new MissingRequestParameterException($this->compilePropertyName('prm')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}