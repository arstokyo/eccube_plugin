<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\DeleteHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class GetPointRequestModel
 *
 * @author kmorino
 */
class DeleteHaisoAdrsRequestModel extends RequestModelAbstract implements DeleteHaisoAdrsRequestModelInterface
{
    const XML_NODE_NAME = 'deleteHaisoAdrs';

    use NoCategory\IdTrait,NoCategory\McodeTrait,NoCategory\EdaTrait;
    
    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (!$this->mcode) { throw new MissingRequestParameterException($this->compilePropertyName('mcode')); };
        if (!$this->eda) { throw new MissingRequestParameterException($this->compilePropertyName('eda')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}