<?php

namespace Plugin\AceClient\AceServices\Model\Response\Message;

trait HasMessageResponseTrait
{
    /**
     * エラーメッセージ
     *
     * @var MessageModel $Message
     */
    protected MessageModel $Message;

    /**
     * {@inheritDoc}
     */
    public function getMessage(): MessageModelInterface
    {
        return $this->Message;
    }

    /**
     * {@inheritDoc}
     */
    public function setMessage(MessageModel $message)
    {
        $this->Message = $message;
    }

}