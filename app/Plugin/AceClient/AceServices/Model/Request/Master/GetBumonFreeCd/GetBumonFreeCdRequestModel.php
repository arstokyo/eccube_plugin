<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetBumonFreeCd;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Class GetBumonFreeCdRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetBumonFreeCdRequestModel extends RequestModelAbstract implements GetBumonFreeCdRequestModelInterface
{
    use NoCategory\IdTrait;

    const XML_NODE_NAME = 'getBumonFreeCd';

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