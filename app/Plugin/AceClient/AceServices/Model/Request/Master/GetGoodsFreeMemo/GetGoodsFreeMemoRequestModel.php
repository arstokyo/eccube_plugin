<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetGoodsFreeMemo;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class GetGoodsFreeMemoRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetGoodsFreeMemoRequestModel extends RequestModelAbstract implements GetGoodsFreeMemoRequestModelInterface
{
    use NoCategory\IdTrait;
    const XML_NODE_NAME = 'getGoodsFreeMemo';

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