<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master2\GetHaisouDayTime;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Souko;
use Plugin\AceClient\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient\AceServices\Model\Dependency\Address;

/**
 * Class GetHaisouDayTimeRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetHaisouDayTimeRequestModel extends RequestModelAbstract implements GetHaisouDayTimeRequestModelInterface
{
    use NoCategory\IdTrait,
        Souko\SoukoTrait,
        Haiso\HcodeTrait,
        Address\ZipTrait;

    const XML_NODE_NAME = 'getHaisouDayTime';

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (!$this->souko) { throw new MissingRequestParameterException($this->compilePropertyName('souko')); };
        if (!$this->hcode) { throw new MissingRequestParameterException($this->compilePropertyName('hcode')); };
        if (!$this->zip) { throw new MissingRequestParameterException($this->compilePropertyName('zip')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}