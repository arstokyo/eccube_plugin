<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetSouko;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class GetSoukoRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetSoukoRequestModel extends RequestModelAbstract implements GetSoukoRequestModelInterface
{
    use NoCategory\IdTrait;
    const XML_NODE_NAME = 'getSouko';

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