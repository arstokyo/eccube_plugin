<?php

namespace Plugin\AceClient\AceServices\Model\Response\Message;

interface MessageNodeInterface
{
    /**
     * Get message
     * 
     * @return MessageInterface
     */
    public function getMessage(): MessageInterface;

    /**
     * Set message
     * 
     * @param MessageModel $message
     * @return void
     */
    public function setMessage(MessageModel $message);
}