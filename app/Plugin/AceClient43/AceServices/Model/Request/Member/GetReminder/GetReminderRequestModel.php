<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetReminder;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\IdTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Mail\MailAdressTrait;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;

/**
 * Class GetPointRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetReminderRequestModel extends RequestModelAbstract implements GetReminderRequestModelInterface
{
    const XML_NODE_NAME = 'getReminder';

    use IdTrait, MailAdressTrait;
    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (!$this->mailadress) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}