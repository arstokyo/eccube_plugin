<?php

namespace Plugin\AceClient\AceServices\Model\Request;

use Plugin\AceClient\AceServices\Model\Request\Dependency\SoapNodeRequestInterface;

interface RequestModelInterface extends SoapNodeRequestInterface
{
    /**
     * Ensure Input Parameters are valid
     * 
     * @return boolean
     */
    public function ensureValidParameters(): bool;

}