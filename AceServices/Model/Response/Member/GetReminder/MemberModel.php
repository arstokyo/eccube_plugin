<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetReminder;

use Plugin\AceClient\AceServices\Model\Response\Depedency\MemberModelResponseAbstract;
use Plugin\AceClient\AceServices\Model\Dependency\Reminder\ReminderModel;
use Plugin\AceClient\AceServices\Model;

/**
 * Class MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class MemberModel extends MemberModelResponseAbstract implements MemberModelInterface
{
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

