<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoodsBunrui;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class GetGoodsBunruiRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetGoodsBunruiRequestModel extends RequestModelAbstract implements GetGoodsBunruiRequestModelInterface
{
    const XML_NODE_NAME = 'getGoodsBunrui';

    use NoCategory\IdTrait;

    /** @var ?string $kubun 分類区分 */
    protected ?string $kubun = null;

    /**
     * {@inheritDoc}
     */
    public function getKubun(): ?string
    {
        return $this->kubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setKubun(?string $kubun)
    {
        $this->kubun = $kubun;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (!$this->kubun) { throw new MissingRequestParameterException($this->compilePropertyName('kubun')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}