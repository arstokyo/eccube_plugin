<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetBumonFree;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;

/**
 * Class GetBumonFreeRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetBumonFreeRequestModel extends RequestModelAbstract implements GetBumonFreeRequestModelInterface
{
    use NoCategory\IdTrait,
        Day\ExecDateFromTrait,
        Day\ExecDateToTrait;

    const XML_NODE_NAME = 'getBumonFree';

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