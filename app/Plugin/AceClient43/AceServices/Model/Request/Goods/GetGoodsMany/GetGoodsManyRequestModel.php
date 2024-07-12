<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoodsMany;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\Souko;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class GetGoodsManyRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetGoodsManyRequestModel extends RequestModelAbstract implements GetGoodsManyRequestModelInterface
{
    const XML_NODE_NAME = 'getGoodsMany';

    use NoCategory\IdTrait,
        Souko\SoukoTrait,
        Good\GcodeTrait;

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (!$this->souko) { throw new MissingRequestParameterException($this->compilePropertyName('souko')); };
        if (!$this->gcode) { throw new MissingRequestParameterException($this->compilePropertyName('gcode')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}