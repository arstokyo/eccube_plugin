<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Message;

/**
 * Trait for Message1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait Message1Trait
{
     /**
     * エラーメッセージ 1
     *
     * @var ?string $message1
     */
    protected ?string $message1 = null;

    /**
     * {@inheritDoc}
     */
    public function getMessage1(): ?string
    {
        return $this->message1;
    }

    /**
     * {@inheritDoc}
     *
     */
    public function setMessage1(?string $message1)
    {
        $this->message1 = $message1;
        return $this;
    }

}