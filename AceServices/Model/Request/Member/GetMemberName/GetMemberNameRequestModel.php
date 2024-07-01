<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetMemberName;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class GetMemberName Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetMemberNameRequestModel extends RequestModelAbstract implements GetMemberNameRequestModelInterface
{
    const XML_NODE_NAME = 'getMemberName';

    /** @var ?int $syid 通販AceシステムID */
    protected ?int $syid = null;

    /** @var ?string $mbid 顧客ID */
    protected ?string $mbid = null;

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
    public function setSyid(?int $syid): static
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

    public function ensureParameterNotMissing(): void
    {
        if (!$this->syid) { throw new MissingRequestParameterException($this->compilePropertyName('syid')); };
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