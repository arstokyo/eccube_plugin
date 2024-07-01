<?php

namespace Plugin\AceClient\AceServices\Model\Request\Goods\GetGtanka;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Day;

/**
 * Class GetGtankaRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetGtankaRequestModel extends RequestModelAbstract implements GetGtankaRequestModelInterface
{
    const XML_NODE_NAME = 'getGtanka';

    use NoCategory\IdTrait,
        Day\ExecDateFromTrait,
        Day\ExecDateToTrait;

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