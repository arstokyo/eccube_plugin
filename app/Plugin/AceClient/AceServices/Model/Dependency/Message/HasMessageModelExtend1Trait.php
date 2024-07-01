<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Message;

trait HasMessageModelExtend1Trait
{
    /**
     * エラーメッセージ
     *
     * @var MessageModelExtend1 $Message
     */
    protected MessageModelExtend1 $Message;

    /**
     * {@inheritDoc}
     */
    public function getMessage(): MessageModelExtend1Interface
    {
        return $this->Message;
    }

    /**
     * {@inheritDoc}
     */
    public function setMessage(MessageModelExtend1 $message): static
    {
        $this->Message = $message;
        return $this;
    }

}