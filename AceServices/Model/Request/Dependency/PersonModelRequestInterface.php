<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\AceServices\Model\Dependency\PersonModelInterface;

interface PersonModelRequestInterface extends PersonModelInterface
{

    /**
     * Set Person Code
     * 
     * @param string $code
     * @return PersonModelRequestInterface
     */
    public function setPersonCode(string $code): self;

}