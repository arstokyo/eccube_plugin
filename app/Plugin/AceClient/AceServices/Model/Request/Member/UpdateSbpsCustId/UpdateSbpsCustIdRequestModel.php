<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\UpdateSbpsCustId;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Card;

/**
 * Class UpdateSbpsCustIdRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class UpdateSbpsCustIdRequestModel extends RequestModelAbstract implements UpdateSbpsCustIdRequestModelInterface
{
    const XML_NODE_NAME = 'updateSbpsCustId';

    use NoCategory\SyidTrait,
        NoCategory\MbidTrait,
        Card\CedaTrait,
        NoCategory\CustidTrait;

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->syid) { throw new MissingRequestParameterException($this->compilePropertyName('syid')); };
        if (!$this->mbid) { throw new MissingRequestParameterException($this->compilePropertyName('mbid')); };
        if (!$this->custid) { throw new MissingRequestParameterException($this->compilePropertyName('custid')); };
        if (!$this->ceda) { throw new MissingRequestParameterException($this->compilePropertyName('ceda')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }

}