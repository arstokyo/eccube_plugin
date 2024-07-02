<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetHktime;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class GetHktimeRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetHktimeRequestModel extends RequestModelAbstract implements GetHktimeRequestModelInterface
{
    use NoCategory\IdTrait,
        NoCategory\CodeTrait;
    const XML_NODE_NAME = 'getHktime';

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