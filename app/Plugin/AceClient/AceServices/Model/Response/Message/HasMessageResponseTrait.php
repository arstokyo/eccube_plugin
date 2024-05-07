<?php

namespace Plugin\AceClient\AceServices\Model\Response\Message;

trait HasMessageResponseTrait
{
    /**
     * Message
     * 
     * @var MessageModel $Message
     */
    protected MessageModel $Message;

    /**
     * {@inheritDoc}
     */
    public function getMessage(): MessageInterface
    {
        return $this->Message;
    }

    /**
     * {@inheritDoc}
     */
    public function setMessage(MessageModel $message)
    {
        $this->Message = $message;
    }

}