<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetBaifile;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\Dependency\Baitai;

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