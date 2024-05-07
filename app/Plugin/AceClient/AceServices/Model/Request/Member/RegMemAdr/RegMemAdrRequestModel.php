<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Request\Dependency\PrmModelRequestInterface;
use Plugin\AceClient\AceServices\Model\Request;

/**
 * Class RegMemAdrRequestModel
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class RegMemAdrRequestModel implements RegMemAdrRequestInterface
{

    const XML_NODE_NAME = 'regMemAdr';
    /** @var int $id SystemId */
    private int $id;

    /** @var MemberPrmInterface $prm Prm */
    private MemberPrmModel $prm;

    /**
     * {@inheritDoc}
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

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