<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Reminder;

/**
 * Trait for Question
 * 
 * @author kmorino
 */
trait QuestionTrait
{

    /** @var ?string $question 質問 */
    protected ?string $question = null;

    /**
     * {@inheritDoc}
     */
    public function getQuestion(): ?string
    {
        return $this->question;
    }

    /**
     * {@inheritDoc}
     */
    public function setQuestion(?string $question)
    {
        $this->question = $question;
        return $this;
    }

}