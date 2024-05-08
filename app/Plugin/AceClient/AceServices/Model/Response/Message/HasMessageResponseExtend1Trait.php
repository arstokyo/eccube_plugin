<?php

namespace Plugin\AceClient\AceServices\Model\Response\Message;

trait HasMessageResponseExtend1Trait
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
    public function setMessage(MessageModelExtend1 $message)
    {
        $this->Message = $message;
    }

}