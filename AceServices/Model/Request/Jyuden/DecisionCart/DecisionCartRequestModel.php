<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\DecisionCart;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Decision Cart Request Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class DecisionCartRequestModel extends RequestModelAbstract implements DecisionCartRequestModelInterface
{
    use NoCategory\IdTrait,
        NoCategory\SessIdTrait;

    const XML_NODE_NAME = 'decisionCart';
    
    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (empty($this->id)) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (empty($this->sessId)) { throw new MissingRequestParameterException($this->compilePropertyName('sessId')); };
    }
}
