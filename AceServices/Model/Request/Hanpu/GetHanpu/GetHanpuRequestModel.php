<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\GetHanpu;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Class GetHanpuRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetHanpuRequestModel extends RequestModelAbstract implements GetHanpuRequestModelInterface
{
    const XML_NODE_NAME = 'getHanpu';

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