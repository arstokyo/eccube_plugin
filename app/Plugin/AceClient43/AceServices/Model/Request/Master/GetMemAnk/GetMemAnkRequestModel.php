<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetMemAnk;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class GetMemAnkRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetMemAnkRequestModel extends RequestModelAbstract implements GetMemAnkRequestModelInterface
{
    use NoCategory\IdTrait,
        NoCategory\MbidTrait;

    const XML_NODE_NAME = 'getMemAnk';

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