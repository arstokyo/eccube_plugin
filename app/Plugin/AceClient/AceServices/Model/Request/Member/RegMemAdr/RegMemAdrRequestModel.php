<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Request\Dependency\PrmModelRequestInterface;

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

    /** @var PrmModelRequestInterface $prm Prm */
    private PrmModelRequestInterface $prm;

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
    public function setId(int $id): RegMemAdrRequestInterface
    {
        $this->id = $id;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPrm(): PrmModelRequestInterface
    {
        return $this->prm;
    }

    /**
     * {@inheritDoc}
     */
    public function setPrm(PrmModelRequestInterface $prm): self
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