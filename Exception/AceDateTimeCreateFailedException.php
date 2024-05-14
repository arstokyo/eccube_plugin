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
    public function __construct(string|int $dateTime , \Throwable $previous = null)
    {
        parent::__construct(sprintf('Could not create AceDateTime from given Date (%s)', $dateTime), $previous);
    }
}