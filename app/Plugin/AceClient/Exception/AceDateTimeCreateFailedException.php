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
    public function __construct(string|int $dateTime , string $format, \Throwable $previous = null)
    {
        parent::__construct(sprintf('Could not create AceDateTime with given Date "%s" from format "%s"', $dateTime, $format), $previous);
    }
}