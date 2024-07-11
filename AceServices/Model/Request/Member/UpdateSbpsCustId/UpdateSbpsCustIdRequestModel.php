<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\UpdateSbpsCustId;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Class UpdateSbpsCustIdRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class UpdateSbpsCustIdRequestModel extends RequestModelAbstract implements UpdateSbpsCustIdRequestModelInterface
{
    const XML_NODE_NAME = 'updateSbpsCustId';

    use NoCategory\SyidTrait,
        NoCategory\MbidTrait;

    /** @var ?string $custid SBPS顧客ID */
    protected ?string $custid = null;

    /** @var ?string $ceda SBPS顧客枝番 */
    protected ?string $ceda = null;

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