<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetPoint;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;


/**
 * Class GetPointRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetPointRequestModel implements GetPointRequestInterface
{
    const XML_NODE_NAME = 'getPoint';

    use NoCategory\IdTrait,NoCategory\McodeTrait;
    /**
     * {@inheritDoc}
     */
    public function ensureValidParameters(): bool
    {
        if (!$this->id) return false;
        if (!$this->mcode) return false;
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function getXmlNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}