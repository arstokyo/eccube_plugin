<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetNyukaYotei;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class GetNyukaYoteiRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetNyukaYoteiRequestModel extends RequestModelAbstract implements GetNyukaYoteiRequestModelInterface
{
    const XML_NODE_NAME = 'getNyukaYotei';

    use NoCategory\IdTrait,
        Good\GdidTrait;

    /** @var ?string $skid 倉庫ID */
    protected ?string $skid = null;

    /**
     * {@inheritDoc}
     */
    public function getSkid(): ?string
    {
        return $this->skid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSkid(?string $skid)
    {
        $this->skid = $skid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (!$this->skid) { throw new MissingRequestParameterException($this->compilePropertyName('skid')); };
        if (!$this->gdid) { throw new MissingRequestParameterException($this->compilePropertyName('gdid')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}