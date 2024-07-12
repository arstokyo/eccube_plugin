<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Message;

/**
 * Trait for エラーメッセージ 2
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait Message2Trait
{
    /**
     * エラーメッセージ 2
     *
     * @var ?string $message2
     */
    protected ?string $message2 = null;

    /**
     * {@inheritDoc}
     */
    public function getMessage2(): ?string
    {
        return $this->message2;
    }

    /**
     * {@inheritDoc}
     */
    public function setMessage2(?string $message2)
    {
        $this->message2 = $message2;
        return $this;
    }

}