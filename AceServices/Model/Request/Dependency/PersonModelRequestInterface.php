<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\AceServices\Model\Dependency\PersonModelInterface;
use Plugin\AceClient\AceServices\Model\Request;

interface PersonModelRequestInterface extends PersonModelInterface
{

    /**
     * Set Person Code
     * 
     * @param string $code
     * @return Request\Dependency\PersonModelRequestInterface
     */
    public function setCode(string $code): self;

}