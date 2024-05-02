<?php

namespace Plugin\AceClient\AceServices\Model\Dependency;

interface EnsureValidParametersInterface
{
    /**
     * Ensure Input Parameters are valid
     * 
     * @return boolean
     */
    public function ensureValidParameters(): bool;
}