<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Reminder;

use Plugin\AceClient\AceServices\Model\Dependency\Reminder\SevenRemindersTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Reminder\ReminderModelInterface;

/**
 * Model for Reminder
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class ReminderModel implements ReminderModelInterface
{
    use SevenRemindersTrait;
}