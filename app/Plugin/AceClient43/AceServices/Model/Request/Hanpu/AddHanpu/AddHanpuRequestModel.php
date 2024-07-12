<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

class AddHanpuRequestModel extends Request\RequestModelAbstract implements AddHanpuRequestModelInterface
{
    const XML_NODE_NAME = 'addHanpu';

    use NoCategory\IdTrait,
        NoCategory\SessIdTrait;

    /** @var HanpuPrmModelInterface $prm Prm */
    protected HanpuPrmModelInterface $prm;

    /**
     * {@inheritDoc}
     */
    public function getPrm(): HanpuPrmModel
    {
        return $this->prm;
    }

    /**
     * {@inheritDoc}
     */
    public function setPrm(HanpuPrmModelInterface $prm): self
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
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return $this::XML_NODE_NAME;
    }
}