<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Reminder;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for Remainder
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait SevenRemindersTrait
{
    use NoCategory\CodeTrait;
    /** @var ?string $question1 質問1 */
    protected ?string $question1 = null;

    /** @var ?string $answer1 回答1 */
    protected ?string $answer1 = null;

    /** @var ?string $question2 質問2 */
    protected ?string $question2 = null;

    /** @var ?string $answer2 回答2 */
    protected ?string $answer2 = null;

    /** @var ?string $question3 質問3 */
    protected ?string $question3 = null;

    /** @var ?string $answer3 回答3 */
    protected ?string $answer3 = null;

    /** @var ?string $question4 質問4 */
    protected ?string $question4 = null;

    /** @var ?string $answer4 回答4 */
    protected ?string $answer4 = null;

    /** @var ?string $question5 質問5 */
    protected ?string $question5 = null;

    /** @var ?string $answer5 回答5 */
    protected ?string $answer5 = null;

    /** @var ?string $question6 質問6 */
    protected ?string $question6 = null;

    /** @var ?string $answer6 回答6 */
    protected ?string $answer6 = null;

    /** @var ?string $question7 質問7 */
    protected ?string $question7 = null;

    /** @var ?string $answer7 回答7 */
    protected ?string $answer7 = null;

    /**
     * {@inheritDoc}
     */
    public function getQuestion1(): ?string
    {
        return $this->question1;
    }

    /**
     * {@inheritDoc}
     */
    public function setQuestion1(?string $question1): static
    {
        $this->question1 = $question1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAnswer1(): ?string
    {
        return $this->answer1;
    }

    /**
     * {@inheritDoc}
     */
    public function setAnswer1(?string $answer1): static
    {
        $this->answer1 = $answer1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getQuestion2(): ?string
    {
        return $this->question2;
    }

    /**
     * {@inheritDoc}
     */
    public function setQuestion2(?string $question2): static
    {
        $this->question2 = $question2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAnswer2(): ?string
    {
        return $this->answer2;
    }

    /**
     * {@inheritDoc}
     */
    public function setAnswer2(?string $answer2): static
    {
        $this->answer2 = $answer2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getQuestion3(): ?string
    {
        return $this->question3;
    }

    /**
     * {@inheritDoc}
     */
    public function setQuestion3(?string $question3): static
    {
        $this->question3 = $question3;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAnswer3(): ?string
    {
        return $this->answer3;
    }

    /**
     * {@inheritDoc}
     */
    public function setAnswer3(?string $answer3): static
    {
        $this->answer3 = $answer3;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getQuestion4(): ?string
    {
        return $this->question4;
    }

    /**
     * {@inheritDoc}
     */
    public function setQuestion4(?string $question4): static
    {
        $this->question4 = $question4;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAnswer4(): ?string
    {
        return $this->answer4;
    }

    /**
     * {@inheritDoc}
     */
    public function setAnswer4(?string $answer4): static
    {
        $this->answer4 = $answer4;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getQuestion5(): ?string
    {
        return $this->question5;
    }

    /**
     * {@inheritDoc}
     */
    public function setQuestion5(?string $question5): static
    {
        $this->question5 = $question5;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAnswer5(): ?string
    {
        return $this->answer5;
    }

    /**
     * {@inheritDoc}
     */
    public function setAnswer5(?string $answer5): static
    {
        $this->answer5 = $answer5;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getQuestion6(): ?string
    {
        return $this->question6;
    }

    /**
     * {@inheritDoc}
     */
    public function setQuestion6(?string $question6): static
    {
        $this->question6 = $question6;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAnswer6(): ?string
    {
        return $this->answer6;
    }

    /**
     * {@inheritDoc}
     */
    public function setAnswer6(?string $answer6): static
    {
        $this->answer6 = $answer6;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getQuestion7(): ?string
    {
        return $this->question7;
    }

    /**
     * {@inheritDoc}
     */
    public function setQuestion7(?string $question7): static
    {
        $this->question7 = $question7;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAnswer7(): ?string
    {
        return $this->answer7;
    }

    /**
     * {@inheritDoc}
     */
    public function setAnswer7(?string $answer7): static
    {
        $this->answer7 = $answer7;
        return $this;
    }
}