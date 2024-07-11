<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\DeleteSbpsCustId;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Card;
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