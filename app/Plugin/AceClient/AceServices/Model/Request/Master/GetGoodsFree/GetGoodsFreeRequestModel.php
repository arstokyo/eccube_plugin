<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetGoodsFree;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;

/**
 * Class GetGoodsFreeRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetGoodsFreeRequestModel extends RequestModelAbstract implements GetGoodsFreeRequestModelInterface
{
    use NoCategory\IdTrait,
        Day\ExecDateFromTrait,
        Day\ExecDateToTrait;

    const XML_NODE_NAME = 'getGoodsFree';

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