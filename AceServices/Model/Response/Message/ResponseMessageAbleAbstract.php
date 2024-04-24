<?php

namespace Plugin\AceClient\AceServices\Model\Response\Message;

class ResponseMessageAbleAbstract implements ResponseMessageAbleInterface
{
    protected string $message1;
    protected string $message2;

    /**
     * {@inheritDoc}
     * 
     */
    public function getMessage1(): string
    {
        return $this->message1;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setMessage1($message1)
    {
        $this->message1 = $message1;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getMessage2(): string
    {
        return $this->message2;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setMessage2($message2)
    {
        $this->message2 = $message2;
    }
}