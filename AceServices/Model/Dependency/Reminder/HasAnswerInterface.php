<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Reminder;

/**
 * Interface for Has 答え
 *
 * @author Ars-Thong kmorino
 */
interface HasAnswerInterface
{
    /**
     * Get 答え
     *
     * @return ?string
     */
    public function getAnswer(): ?string;

    /**
     * Set 答え
     *
     * @param ?string $answer
     * @return $this
     */
    public function setAnswer(?string $answer): static;
}