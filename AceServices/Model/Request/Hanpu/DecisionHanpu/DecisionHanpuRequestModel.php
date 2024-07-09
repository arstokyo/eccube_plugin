<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\DecisionHanpu;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Class DecisionHanpuRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class DecisionHanpuRequestModel extends RequestModelAbstract implements DecisionHanpuRequestModelInterface
{
    const XML_NODE_NAME = 'decisionHanpu';

    use NoCategory\IdTrait,
        NoCategory\SessIdTrait;

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (!$this->sessId) { throw new MissingRequestParameterException($this->compilePropertyName('sessId')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}