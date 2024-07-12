<?php

namespace Plugin\AceClient43\Exception;

class MissingRequestParameterException extends AceClientBaseException
{
    /**
     * Constructor
     * 
     * @param string $nullParam Null Parameter Name
     * @param int $code
     * @param \Throwable $previous
     */
    public function __construct(string $nullParam, \Throwable $previous = null)
    {
        parent::__construct(sprintf('The following parameter is missing: %s', $nullParam), $previous);
    }
}