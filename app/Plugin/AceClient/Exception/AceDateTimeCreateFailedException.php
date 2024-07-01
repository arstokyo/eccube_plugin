<?php

namespace Plugin\AceClient\Exception;

class AceDateTimeCreateFailedException extends AceClientBaseException
{
    /**
     * Constructor
     * 
     * @param string $message Error message
     * @param string|int  $code
     * @param \Throwable $previous
     */
    public function __construct($dateTime , \Throwable $previous = null)
    {
        parent::__construct(sprintf('Could not create AceDateTime from given string (%s)', $dateTime), $previous);
    }
}