<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetMemAnkFreemst;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class GetMrmAnkFreemstRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetMemAnkFreemstRequestModel extends RequestModelAbstract implements GetMemAnkFreemstRequestModelInterface
{
    use NoCategory\IdTrait;
    const XML_NODE_NAME = 'getMemAnkFreemst';

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