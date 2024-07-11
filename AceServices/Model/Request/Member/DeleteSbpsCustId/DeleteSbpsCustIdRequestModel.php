<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\DeleteSbpsCustId;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Class DeleteSbpsCustIdRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class DeleteSbpsCustIdRequestModel extends RequestModelAbstract implements DeleteSbpsCustIdRequestModelInterface
{
    const XML_NODE_NAME = 'deleteSbpsCustId';

    use NoCategory\SyidTrait,
        NoCategory\MbidTrait;

    /** @var ?string $ceda SBPS顧客枝番 */
    protected ?string $ceda = null;

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