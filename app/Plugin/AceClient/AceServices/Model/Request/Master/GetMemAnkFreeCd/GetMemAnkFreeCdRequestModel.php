<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetMemAnkFreeCd;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class GetMemAnkFreeCdRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetMemAnkFreeCdRequestModel extends RequestModelAbstract implements GetMemAnkFreeCdRequestModelInterface
{
    use NoCategory\IdTrait;
    const XML_NODE_NAME = 'getMemAnkFreeCd';

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