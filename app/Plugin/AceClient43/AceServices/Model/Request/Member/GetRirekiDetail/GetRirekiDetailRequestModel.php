<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetRirekiDetail;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Class GetRirekiDetailRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetRirekiDetailRequestModel extends RequestModelAbstract implements GetRirekiDetailRequestModelInterface
{
    use NoCategory\IdTrait,
        NoCategory\McodeTrait,
        Denpyo\DennoTrait,
        Denpyo\DenkuTrait;

    const XML_NODE_NAME = 'getRirekiDetail';

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (!$this->mcode) { throw new MissingRequestParameterException($this->compilePropertyName('mcode')); };
        if (!$this->denno) { throw new MissingRequestParameterException($this->compilePropertyName('denno')); };
        if ($this->denku === null) { throw new MissingRequestParameterException($this->compilePropertyName('denku')); };

    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}