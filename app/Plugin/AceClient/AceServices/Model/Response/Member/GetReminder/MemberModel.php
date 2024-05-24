<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetReminder;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Reminder\ReminderModel;
use Plugin\AceClient\AceServices\Model;

/**
 * Class MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class MemberModel implements MemberModelInterface
{
    use HasMessageModelTrait;
    /**
     * Reminder
     *
     * @var Model\Dependency\Reminder\ReminderModel $reminder
     */
    protected ?ReminderModel $reminder  = null;

    /**
     * {@inheritDoc}
     */
    function getReminder(): ?ReminderModel
    {
        return $this->reminder;
    }

    /**
    * {@inheritDoc}
    */
    function setReminder(?ReminderModel $reminder): void
    {
        $this->reminder = $reminder;
    }
}

