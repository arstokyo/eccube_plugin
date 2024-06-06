<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetOkuri;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class GetOkuriRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetOkuriRequestModel extends RequestModelAbstract implements GetOkuriRequestModelInterface
{
    use NoCategory\IdTrait;
    const XML_NODE_NAME = 'getOkuri';

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