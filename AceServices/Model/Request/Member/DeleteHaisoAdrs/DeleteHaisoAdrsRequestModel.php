<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\DeleteHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;


/**
 * Class GetPointRequestModel
 *
 * @author kmorino
 */
class DeleteHaisoAdrsRequestModel implements DeleteHaisoAdrsRequestInterface
{
    const XML_NODE_NAME = 'deleteHaisoAdrs';

    use NoCategory\IdTrait,NoCategory\McodeTrait,NoCategory\EdaTrait;
    
    /**
     * {@inheritDoc}
     */
    public function ensureValidParameters(): bool
    {
        if (!$this->id) return false;
        if (!$this->mcode) return false;
        if (!$this->eda) return false;
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