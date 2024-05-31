<?php

namespace Plugin\AceClient\Exception;

class AceClientBaseException extends \Exception
{
    /**
     * @param string     $message  Exception message.
     * @param \Throwable $previous Previous exception.
     */
    public function __construct(string $message, \Throwable $previous = null)
    {
        parent::__construct($message, $this->code, $previous);
    }

}