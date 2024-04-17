<?php

namespace Plugin\AceClient\AceServices\Model\Request;

class RequestModelAbstract implements RequestModelInterface
{
    /**
     * Ensure Input Parameters are valid
     * 
     * @return boolean
     */
    public function EnsureValidParameters(): bool
    {
        return true;
    }
}