<?php

namespace Plugin\AceClient\AceServices\Model\Request;

interface RequestModelInterface
{
    /**
     * Ensure Input Parameters are valid
     * 
     * @return boolean
     */
    public function EnsureValidParameters(): bool;
}