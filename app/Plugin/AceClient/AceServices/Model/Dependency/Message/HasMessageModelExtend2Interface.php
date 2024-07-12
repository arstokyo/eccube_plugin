<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Message;

interface HasMessageModelExtend2Interface
{
    /**
     * Get エラーメッセージ
     *
     * @return MessageModelExtend2Interface
     */
    public function getMessage(): MessageModelExtend2Interface;

    /**
     * Set エラーメッセージ
     *
     * @param MessageModelExtend2 $message
     * @return $this
     */
    public function setMessage(MessageModelExtend2 $message);
}