<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetMemberFreemst;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class GetMemberFreemstRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetMemberFreemstRequestModel extends RequestModelAbstract implements GetMemberFreemstRequestModelInterface
{
    use NoCategory\IdTrait;
    const XML_NODE_NAME = 'getMemberFreemst';

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