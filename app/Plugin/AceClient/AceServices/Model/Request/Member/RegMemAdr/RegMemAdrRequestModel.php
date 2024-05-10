<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\IdTrait;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;

/**
 * Class RegMemAdrRequestModel
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class RegMemAdrRequestModel extends RequestModelAbstract implements RegMemAdrRequestInterface
{

    const XML_NODE_NAME = 'regMemAdr';

    use IdTrait;   

    /** @var MemberPrmInterface $prm Prm */
    private MemberPrmModel $prm;

    /**
     * {@inheritDoc}
     */
    public function getPrm(): string|null|object
    {
        return $this->prm->toData();
    }

    /**
     * @param Request\Member\RegMemAdr\MemberPrmModel $prm
     */
    public function setPrm(MemberPrmInterface $prm): self
    {
        $this->prm = $prm;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureValidParameters(): bool
    {
        if (!$this->id) return false;
        if ((!$this->prm) or (!$this->prm->ensureValidParameters())) return false;
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function getXmlNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
    
}