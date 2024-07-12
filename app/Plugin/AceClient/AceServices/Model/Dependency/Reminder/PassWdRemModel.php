<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Reminder;

/**
 * Model for PasswdReminder
 *
 * @author kmorino
 */
class PassWdRemModel implements PassWdRemModelInterface
{
    use QuestionTrait,
        AnswerTrait;
}