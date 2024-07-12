<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Reminder;

/**
 * Trait for 答え
*
* @author kmorino
*/
trait AnswerTrait
    {

    /** @var ?string $answer 答え */

    protected ?string $answer = null;

    /**
     * {@inheritDoc}
     */
    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    /**
     * {@inheritDoc}
     */
    public function setAnswer(?string $answer)
    {
        $this->answer = $answer;
        return $this;
    }

}