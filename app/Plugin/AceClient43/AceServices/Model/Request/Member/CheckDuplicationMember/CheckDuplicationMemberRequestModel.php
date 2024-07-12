<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\CheckDuplicationMember;

use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

class CheckDuplicationMemberRequestModel extends Request\RequestModelAbstract implements CheckDuplicationMemberRequestModelInterface
{
    const XML_NODE_NAME = 'checkDuplicationMember';

    use NoCategory\SyidTrait;

    /** @var Request\Member\CheckDuplicationMember\MemberPrmModel $prm Prm */
    private MemberPrmModel $prm;

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