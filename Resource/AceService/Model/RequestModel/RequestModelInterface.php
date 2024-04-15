<?php

namespace Plugin\AceClient\AceService\Model\Request;

interface RequestModelInterface
{
    /**
     * Ensure Input Parameters are valid
     * 
     * @return boolean
     */
    public function EnsureValidParameters(): bool;
}