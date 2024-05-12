<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\IdTrait;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class RegMemAdrRequestModel
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class RegMemAdrRequestModel extends RequestModelAbstract implements RegMemAdrRequestModelInterface
{

    const XML_NODE_NAME = 'regMemAdr';

    use IdTrait;   

    /** @var MemberPrmModelInterface $prm Prm */
    private MemberPrmModel $prm;

    /**
     * {@inheritDoc}
     */
    public function getPrm(): string|null|object
    {
        return $this->prm->toData();
    }

    /**
     * {@inheritDoc}
     */
    public function setPrm(MemberPrmModelInterface $prm): self
    {
        $this->prm = $prm;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if ((!$this->prm)) { throw new MissingRequestParameterException($this->compilePropertyName('prm')); };
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