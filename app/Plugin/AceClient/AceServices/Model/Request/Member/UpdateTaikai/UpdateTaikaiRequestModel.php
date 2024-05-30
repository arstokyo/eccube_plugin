<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\UpdateTaikai;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class UpdateTaikaiRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class UpdateTaikaiRequestModel extends RequestModelAbstract implements UpdateTaikaiRequestModelInterface
{
    use NoCategory\IdTrait,
        NoCategory\McodeTrait,
        NoCategory\TaikaiTrait;

    const XML_NODE_NAME = 'updateTaikai';

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (!$this->mcode) { throw new MissingRequestParameterException($this->compilePropertyName('mcode')); };
        if (null === $this->taikai) { throw new MissingRequestParameterException($this->compilePropertyName('taikai')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}