<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetMemAnk;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class GetMemAnkRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetMemAnkRequestModel extends RequestModelAbstract implements GetMemAnkRequestModelInterface
{
    use NoCategory\IdTrait;

    const XML_NODE_NAME = 'getMemAnk';

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
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}