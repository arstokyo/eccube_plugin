<?php

namespace Plugin\AceClient\AceServices\Model\Request\Contact\RegContact;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

class RegContactRequestModel extends Request\RequestModelAbstract implements RegContactRequestModelInterface
{
    const XML_NODE_NAME = 'regContact';

    use NoCategory\IdTrait,
        NoCategory\SessIdTrait;

    /** @var InquiryPrmModel $prm Prm */
    private InquiryPrmModel $prm;


    /**
     * {@inheritDoc}
     */
    public function getPrm(): InquiryPrmModel
    {
        return $this->prm;
    }

    /**
     * {@inheritDoc}
     */
    public function setPrm(InquiryPrmModel $prm): self
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