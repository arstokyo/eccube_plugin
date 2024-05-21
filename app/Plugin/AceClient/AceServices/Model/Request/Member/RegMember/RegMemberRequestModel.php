<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\Exception\MissingRequestParameterException;

class RegMemberRequestModel extends Request\RequestModelAbstract implements RegMemberRequestModelInterface
{
    const XML_NODE_NAME = 'regMember';

    use NoCategory\IdTrait, 
        NoCategory\SessIdTrait;

    /** @var MemberModelInterface $prm Prm */
    private MemberModel $prm;

    /**
     * {@inheritDoc}
     */
    public function getPrm(): MemberModelInterface
    {
        return $this->prm;
    }

    /**
     * {@inheritDoc}
     */
    public function setPrm(MemberModelInterface $prm): self
    {
        $this->prm = $prm;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (empty($this->id)) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (empty($this->sessId)) { throw new MissingRequestParameterException($this->compilePropertyName('sessId')); };
        if (empty($this->prm))  { throw new MissingRequestParameterException($this->compilePropertyName('prm')); };
        $this->prm->ensureParameterNotMissing();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
    

}