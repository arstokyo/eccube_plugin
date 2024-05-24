<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Reminder;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\HasCodeInterface;

/**
 * Interface for Has ReminderInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasSevenRemindersInterface extends HasCodeInterface
{
    /**
     * Get 質問1
     *
     * @return ?string
     */
    public function getQuestion1(): ?string;

    /**
     * Set 質問1
     *
     * @param ?string $question1
     * @return $this
     */
    public function setQuestion1(?string $question1): static;

    /**
     * Get 回答1
     *
     * @return ?string
     */
    public function getAnswer1(): ?string;

    /**
     * Set 回答1
     *
     * @param ?string $answer1
     * @return $this
     */
    public function setAnswer1(?string $answer1): static;

    /**
     * Get 質問2
     *
     * @return ?string
     */
    public function getQuestion2(): ?string;

    /**
     * Set 質問2
     *
     * @param ?string $question2
     * @return $this
     */
    public function setQuestion2(?string $question2): static;

    /**
     * Get 回答2
     *
     * @return ?string
     */
    public function getAnswer2(): ?string;

    /**
     * Set 回答2
     *
     * @param ?string $answer2
     * @return $this
     */
    public function setAnswer2(?string $answer2): static;

    /**
     * Get 質問3
     *
     * @return ?string
     */
    public function getQuestion3(): ?string;

    /**
     * Set 質問3
     *
     * @param ?string $question3
     * @return $this
     */
    public function setQuestion3(?string $question3): static;

    /**
     * Get 回答3
     *
     * @return ?string
     */
    public function getAnswer3(): ?string;

    /**
     * Set 回答3
     *
     * @param ?string $answer3
     * @return $this
     */
    public function setAnswer3(?string $answer3): static;

    /**
     * Get 質問4
     *
     * @return ?string
     */
    public function getQuestion4(): ?string;

    /**
     * Set 質問4
     *
     * @param ?string $question4
     * @return $this
     */
    public function setQuestion4(?string $question4): static;

    /**
     * Get 回答4
     *
     * @return ?string
     */
    public function getAnswer4(): ?string;

    /**
     * Set 回答4
     *
     * @param ?string $answer4
     * @return $this
     */
    public function setAnswer4(?string $answer4): static;

    /**
     * Get 質問5
     *
     * @return ?string
     */
    public function getQuestion5(): ?string;

    /**
     * Set 質問5
     *
     * @param ?string $question5
     * @return $this
     */
    public function setQuestion5(?string $question5): static;

    /**
     * Get 回答5
     *
     * @return ?string
     */
    public function getAnswer5(): ?string;

    /**
     * Set 回答5
     *
     * @param ?string $answer5
     * @return $this
     */
    public function setAnswer5(?string $answer5): static;

    /**
     * Get 質問6
     *
     * @return ?string
     */
    public function getQuestion6(): ?string;

    /**
     * Set 質問6
     *
     * @param ?string $question6
     * @return $this
     */
    public function setQuestion6(?string $question6): static;

    /**
     * Get 回答6
     *
     * @return ?string
     */
    public function getAnswer6(): ?string;

    /**
     * Set 回答6
     *
     * @param ?string $answer6
     * @return $this
     */
    public function setAnswer6(?string $answer6): static;

    /**
     * Get 質問7
     *
     * @return ?string
     */
    public function getQuestion7(): ?string;

    /**
     * Set 回答7
     *
     * @param ?string $question7
     * @return $this
     */
    public function setQuestion7(?string $question7): static;

    /**
     * Get 回答7
     *
     * @return ?string
     */
    public function getAnswer7(): ?string;

    /**
     * Set 回答7
     *
     * @param ?string $answer7
     * @return $this
     */
    public function setAnswer7(?string $answer7): static;
}