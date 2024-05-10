<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\CheckMailAdress;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;


/**
 * Class GetPointRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class CheckMailAdressRequestModel extends RequestModelAbstract implements CheckMailAdressRequestInterface
{
    const XML_NODE_NAME = 'checkMailAdress';

    use NoCategory\IdTrait,NoCategory\MailAdressTrait;
    /**
     * {@inheritDoc}
     */
    public function ensureValidParameters(): bool
    {
        if (!$this->id) return false;
        if (!$this->mailadress) return false;
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