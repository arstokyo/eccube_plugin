<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetJcode;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class GetJcodeRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetJcodeRequestModel extends RequestModelAbstract implements GetJcodeRequestModelInterface
{
    use NoCategory\IdTrait;
    const XML_NODE_NAME = 'getJcode';

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