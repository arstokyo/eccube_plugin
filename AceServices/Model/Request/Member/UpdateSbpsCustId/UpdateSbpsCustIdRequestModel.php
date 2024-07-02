<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\UpdateSbpsCustId;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class UpdateSbpsCustIdRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class UpdateSbpsCustIdRequestModel extends RequestModelAbstract implements UpdateSbpsCustIdRequestModelInterface
{
    const XML_NODE_NAME = 'updateSbpsCustId';

    /** @var ?int $syid 通販AceID */
    protected ?int $syid = null;

    /** @var ?string $mbid 顧客ID */
    protected ?string $mbid = null;

    /** @var ?string $custid SBPS顧客ID */
    protected ?string $custid = null;

    /** @var ?string $ceda SBPS顧客枝番 */
    protected ?string $ceda = null;

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
    public function getMbid(): ?string
    {
        return $this->mbid;
    }

    /**
     * {@inheritDoc}
     */
    public function setMbid(?string $mbid)
    {
        $this->mbid = $mbid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCustid(): ?string
    {
        return $this->custid;
    }

    /**
     * {@inheritDoc}
     */
    public function setCustid(?string $custid)
    {
        $this->custid = $custid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCeda(): ?string
    {
        return $this->ceda;
    }

    /**
     * {@inheritDoc}
     */
    public function setCeda(?string $ceda)
    {
        $this->ceda = $ceda;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->syid) { throw new MissingRequestParameterException($this->compilePropertyName('syid')); };
        if (!$this->mbid) { throw new MissingRequestParameterException($this->compilePropertyName('mbid')); };
        if (!$this->custid) { throw new MissingRequestParameterException($this->compilePropertyName('custid')); };
        if (!$this->ceda) { throw new MissingRequestParameterException($this->compilePropertyName('ceda')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }

}