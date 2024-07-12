<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetBaifile;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\Baitai;

/**
 * Class GetBaifileRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetBaifileRequestModel extends RequestModelAbstract implements GetBaifileRequestModelInterface
{
    use NoCategory\IdTrait,
        Baitai\BcodeTrait;

    const XML_NODE_NAME = 'getBaifile';

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