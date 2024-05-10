<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetReminder;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\IdTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Mail\MailAdressTrait;


/**
 * Class GetPointRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetReminderRequestModel implements GetReminderRequestInterface
{
    const XML_NODE_NAME = 'getReminder';

    use IdTrait, MailAdressTrait;
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