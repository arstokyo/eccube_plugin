<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request\Jyuden;
use Plugin\AceClient\AceServices\Model\Request\Dependency\PersonModelRequestInterface;

interface PersonModelInterface extends PersonModelRequestInterface
{

     /**
     * Set Person Code
     * 
     * @param string $code
     * @return Jyuden\Dependency\PersonModelInterface
     */
    public function setPersonCode(string $code): self;
}
