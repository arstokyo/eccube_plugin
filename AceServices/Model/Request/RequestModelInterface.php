<?php

namespace Plugin\AceClient\AceServices\Model\Request;

use Plugin\AceClient\AceServices\Model\Request\Dependency\SoapRequestAbleInterface;

interface RequestModelInterface extends SoapRequestAbleInterface
{
    /**
     * Ensure Input Parameters are valid
     * 
     * @return boolean
     */
    public function ensureValidParameters(): bool;

}