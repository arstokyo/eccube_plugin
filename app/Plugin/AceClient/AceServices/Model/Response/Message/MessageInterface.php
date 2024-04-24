<?php

namespace Plugin\AceClient\AceServices\Model\Response\Message;

/**
 * Interface for Message Model
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface MessageInterface
{
    /**
     * Get the value of message1
     */ 
    public function getMessage1(): string;

    /**
     * Set the value of message1
     *
     * @param string $message1
     * @return void
     */ 
    public function setMessage1($message1);


    /**
     * Get the value of message2
     */ 
    public function getMessage2(): string;

    /**
     * Set the value of message2
     *
     * @param string $message2
     * @return void
     */ 
    public function setMessage2($message2);

}