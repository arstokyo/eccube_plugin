<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Dependency\PersonModelRequestInterface;

interface PersonModelInterface extends PersonModelRequestInterface
{

     /**
     * Set Person Code
     * 
     * @param string $code
     * @return Request\Jyuden\Dependency\PersonModelInterface
     */
    public function setCode(string $code): self;
}
