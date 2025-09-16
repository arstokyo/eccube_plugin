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

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Reminder\ReminderModel;

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
     * @var ReminderModel
     */
    protected ?ReminderModel $reminder = null;

    /**
     * {@inheritDoc}
     */
    public function getReminder(): ?ReminderModel
    {
        return $this->reminder;
    }

    /**
     * {@inheritDoc}
     */
    public function setReminder(?ReminderModel $reminder): void
    {
        $this->reminder = $reminder;
    }
}
