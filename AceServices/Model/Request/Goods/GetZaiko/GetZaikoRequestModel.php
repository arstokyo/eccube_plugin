<?php

namespace Plugin\AceClient\AceServices\Model\Request\Goods\GetZaiko;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\Dependency\Souko;
use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Class GetZaikoRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetZaikoRequestModel extends RequestModelAbstract implements GetZaikoRequestModelInterface
{
    const XML_NODE_NAME = 'getZaiko';

    use NoCategory\IdTrait,
        Souko\SoukoTrait,
        Good\GdidTrait;

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (!$this->souko) { throw new MissingRequestParameterException($this->compilePropertyName('souko')); };
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