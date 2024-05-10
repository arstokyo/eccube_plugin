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
     */
    public function setQuestion1(?string $question1);

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
     */
    public function setAnswer1(?string $answer1);

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
     */
    public function setQuestion2(?string $question2);

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
     */
    public function setAnswer2(?string $answer2);

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
     */
    public function setQuestion3(?string $question3);

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
     */
    public function setAnswer3(?string $answer3);

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
     */
    public function setQuestion4(?string $question4);

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
     */
    public function setAnswer4(?string $answer4);

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
     */
    public function setQuestion5(?string $question5);

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
     */
    public function setAnswer5(?string $answer5);

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
     */
    public function setQuestion6(?string $question6);

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
     */
    public function setAnswer6(?string $answer6);

    /**
     * Get 質問7
     *
     * @return ?string
     */
    public function getQuestion7(): ?string;

    /**
     * Set 質問7
     *
     * @param ?string $question7
     */
    public function setQuestion7(?string $question7);

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
     */
    public function setAnswer7(?string $answer7);
}
