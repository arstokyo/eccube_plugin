<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetReminder;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Reminder\ReminderModel;

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
     * @return ?ReminderModel
     */
    public function getReminder(): ?ReminderModel;

    /**
     * Set Reminder
     *
     * @param ?ReminderModel $reminder
     *
     * @return void
     */
    public function setReminder(?ReminderModel $reminder): void;
}
