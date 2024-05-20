<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Reminder;

/**
 * Trait for 質問
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
    public function setQuestion(?string $question): static
    {
        $this->question = $question;
        return $this;
    }

}