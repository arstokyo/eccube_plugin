<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Message;

interface HasMessageModelInterface
{
    /**
     * Get エラーメッセージ
     *
     * @return MessageModelInterface
     */
    public function getMessage(): MessageModelInterface;

    /**
     * Set エラーメッセージ
     *
     * @param MessageModel $message
     * @return $this
     */
    public function setMessage(MessageModel $message);
}