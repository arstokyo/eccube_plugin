<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\DeleteSbpsCustId;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Card;
/**
 * Class DeleteSbpsCustIdRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class DeleteSbpsCustIdRequestModel extends RequestModelAbstract implements DeleteSbpsCustIdRequestModelInterface
{
    const XML_NODE_NAME = 'deleteSbpsCustId';

    use NoCategory\SyidTrait,
        NoCategory\MbidTrait,
        Card\CedaTrait;

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->syid) { throw new MissingRequestParameterException($this->compilePropertyName('syid')); };
        if (!$this->mbid) { throw new MissingRequestParameterException($this->compilePropertyName('mbid')); };
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