<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetPoint;

use Plugin\AceClient\AceServices\Model\Request;


/**
 * Class GetPointRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetPointRequestModel implements GetPointRequestInterface
{
    const XML_NODE_NAME = 'getPoint';

    /** @var int $id SystemId */
    private int $id;

    /** @var string $mcode 顧客コード */
    private string $mcode;

    /**
     * Get SystemId
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set SystemID
     *
     * @param int $id
     * @return Request\Member\GetPoint\GetPointRequestModel
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get 顧客コード
     *
     * @return string
     */
    public function getMcode(): string
    {
        return $this->mcode;
    }

    /**
     * Set 顧客コード
     *
     * @param string $mcode
     * @return Request\Member\GetPoint\GetPointRequestModel
     */
    public function setMcode(string $mcode): self
    {
        $this->mcode = $mcode;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureValidParameters(): bool
    {
        if (!$this->id) return false;
        if (!$this->mcode) return false;
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