<?php

namespace Plugin\AceClient\AceServices\Model\Response\Message;

class MessageNodeModel implements MessageNodeInterface
{
    /**
     * Message
     * 
     * @var MessageModel $Message
     */
    protected MessageModel $Message;

    /**
     * Get message
     * 
     * @return MessageModel
     */
    public function getMessage(): MessageInterface
    {
        return $this->Message;
    }

    /**
     * Set message
     * 
     * @param MessageModel $message
     * @return void
     */
    public function setMessage(MessageModel $message)
    {
        $this->Message = $message;
    }

}