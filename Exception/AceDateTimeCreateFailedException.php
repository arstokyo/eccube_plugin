<?php

namespace Plugin\AceClient\Exception;

class AceDateTimeCreateFailedException extends AceClientBaseException
{
    /**
     * Constructor
     * 
     * @param string $message Error message
     * @param int $code
     * @param \Throwable $previous
     */
    public function __construct(string $message = null, \Throwable $previous = null)
    {
        parent::__construct($message ?? 'Could not create AceDateTime', $previous);
    }
}