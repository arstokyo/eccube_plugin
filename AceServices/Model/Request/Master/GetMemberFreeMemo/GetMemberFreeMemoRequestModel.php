<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetMemberFreeMemo;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class GetMemberFreeMemoRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetMemberFreeMemoRequestModel extends RequestModelAbstract implements GetMemberFreeMemoRequestModelInterface
{
    use NoCategory\IdTrait;
    const XML_NODE_NAME = 'getMemberFreeMemo';

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