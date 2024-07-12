<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetHaisoAdrs;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class GetHaisoAdrsRequestModel
 *
 * @author k-morino
 */
class GetHaisoAdrsRequestModel extends RequestModelAbstract implements GetHaisoAdrsRequestModelInterface
{
    const XML_NODE_NAME = 'getHaisouAdrs';

    use NoCategory\IdTrait, NoCategory\McodeTrait;

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (!$this->mcode) { throw new MissingRequestParameterException($this->compilePropertyName('mcode')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}