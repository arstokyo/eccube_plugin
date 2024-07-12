<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetPointRireki;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class GetPointRirekiRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetPointRirekiRequestModel extends RequestModelAbstract implements GetPointRirekiRequestModelInterface
{
    const XML_NODE_NAME = 'getPointRireki';

    use NoCategory\SyidTrait,
        NoCategory\JmemidTrait;

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->syid) { throw new MissingRequestParameterException($this->compilePropertyName('syid')); };
        if (!$this->jmemid) { throw new MissingRequestParameterException($this->compilePropertyName('jmemid')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }

}