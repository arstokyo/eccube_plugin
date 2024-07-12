<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetBumonFreeMemo;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class GetBumonFreeMemoRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetBumonFreeMemoRequestModel extends RequestModelAbstract implements GetBumonFreeMemoRequestModelInterface
{
    use NoCategory\IdTrait;

    const XML_NODE_NAME = 'getBumonFreeMemo';

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