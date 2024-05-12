<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetReminder;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Reminder\ReminderModel;
use Plugin\AceClient\AceServices\Model;



/**
 * Interface MemberModelInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface MemberModelInterface extends HasMessageModelInterface
{
    /**
    * Get Reminder
    *
    * @return ?Model\Dependency\Reminder\ReminderModel
    */
    public function getReminder(): ?ReminderModel;

    /**
     * Set Reminder
     *
     * @param ?Model\Dependency\Reminder\ReminderModel $reminder
     * @return void
     */
    public function setReminder(?ReminderModel $reminder): void;
}