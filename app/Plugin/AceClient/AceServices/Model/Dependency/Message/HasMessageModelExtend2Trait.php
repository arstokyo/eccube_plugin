<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Message;

trait HasMessageModelExtend2Trait
{
    /**
     * エラーメッセージ
     *
     * @var MessageModelExtend2 $Message
     */
    protected MessageModelExtend2 $Message;

    /**
     * {@inheritDoc}
     */
    public function getMessage(): MessageModelExtend2Interface
    {
        return $this->Message;
    }

    /**
     * {@inheritDoc}
     */
    public function setMessage(MessageModelExtend2 $message)
    {
        $this->Message = $message;
        return $this;
    }

}