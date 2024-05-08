<?php

namespace Plugin\AceClient\AceServices\Model\Response\Message;

interface HasMessageResponseExtend1Interface
{
    /**
     * Get エラーメッセージ
     *
     * @return MessageModelExtend1Interface
     */
    public function getMessage(): MessageModelExtend1Interface;

    /**
     * Set エラーメッセージ
     *
     * @param MessageModelExtend1 $message
     * @return void
     */
    public function setMessage(MessageModelExtend1 $message);
}