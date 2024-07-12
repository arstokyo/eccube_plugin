<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Message;

interface HasMessageModelExtend1Interface
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
     * @return $this
     */
    public function setMessage(MessageModelExtend1 $message);
}