<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Message;

trait HasMessageModelTrait
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
        return $this;
    }

}