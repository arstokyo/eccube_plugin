<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Reminder;

/**
 * Interface for Has 質問
 *
 * @author kmorino
 */
interface HasQuestionInterface
{
/**
     * Get 質問
     *
     * @return ?string
     */
    public function getQuestion(): ?string;

    /**
     * Set 質問
     *
     * @param ?string $question1
     * @return $this
     */
    public function setQuestion(?string $question): static;
}