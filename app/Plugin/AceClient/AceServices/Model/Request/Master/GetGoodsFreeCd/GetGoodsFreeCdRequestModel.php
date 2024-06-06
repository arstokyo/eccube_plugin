<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetGoodsFreeCd;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class GetGoodsFreeCdRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetGoodsFreeCdRequestModel extends RequestModelAbstract implements GetGoodsFreeCdRequestModelInterface
{
    use NoCategory\IdTrait;
    const XML_NODE_NAME = 'getGoodsFreeCd';

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