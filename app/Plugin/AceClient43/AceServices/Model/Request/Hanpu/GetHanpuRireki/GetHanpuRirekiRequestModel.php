<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\GetHanpuRireki;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class GetHanpuRirekiRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetHanpuRirekiRequestModel extends RequestModelAbstract implements GetHanpuRirekiRequestModelInterface
{
    const XML_NODE_NAME = 'getHanpuRireki';

    use NoCategory\IdTrait,
        NoCategory\McodeTrait;

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (!$this->mcode) { throw new MissingRequestParameterException($this->compilePropertyName('mcode')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}