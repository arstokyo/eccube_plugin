<?php

namespace Plugin\AceClient\AceServices\Model\Response\Message;

interface HasMessageResponseInterface
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
     * @return void
     */
    public function setMessage(MessageModel $message);
}