<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetOkuriHkTime;


use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Model for Okuri Hk Time Request Model
 * 
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */

class GetOkuriHkTimeRequestModel extends RequestModelAbstract implements GetOkuriHkTimeRequestModelInterface
{

    const XML_NODE_NAME = "getOkuriHkTime";


    use NoCategory\IdTrait;

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
