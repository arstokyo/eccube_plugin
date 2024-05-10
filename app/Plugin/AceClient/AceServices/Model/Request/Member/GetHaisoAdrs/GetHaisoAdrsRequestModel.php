<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;

/**
 * Class GetHaisoAdrsRequestModel
 *
 * @author k-morino
 */
class GetHaisoAdrsRequestModel extends RequestModelAbstract implements GetHaisoAdrsRequestInterface
{
    const XML_NODE_NAME = 'getHaisouAdrs';

    use NoCategory\IdTrait, NoCategory\McodeTrait;

    /**
     * {@inheritDoc}
     */
    public function ensureValidParameters(): bool
    {
        if (!$this->id) return false;
        if (!$this->mcode) return false;
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function getXmlNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}