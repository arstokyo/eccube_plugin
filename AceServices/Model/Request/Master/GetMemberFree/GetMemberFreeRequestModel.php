<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetMemberFree;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Class GetMemberFreeRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetMemberFreeRequestModel extends RequestModelAbstract implements GetMemberFreeRequestModelInterface
{
    use NoCategory\IdTrait;

    const XML_NODE_NAME = 'getMemberFree';

    /** @var ?string $mbid 顧客ID */
    protected ?string $mbid = null;

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
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (!$this->mbid) { throw new MissingRequestParameterException($this->compilePropertyName('mbid')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}