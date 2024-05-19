<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Reminder;

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