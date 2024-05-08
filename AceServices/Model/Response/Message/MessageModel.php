<?php

namespace Plugin\AceClient\AceServices\Model\Response\Message;

/**
 * MessageModel
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class MessageModel implements MessageModelInterface
{
    /**
     * エラーメッセージ 1
     *
     * @var ?string $message1
     */
    protected ?string $message1 = null;

    /**
     * エラーメッセージ 2
     *
     * @var ?string $message2
     */
    protected ?string $message2 = null;

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
    }

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
    }
}