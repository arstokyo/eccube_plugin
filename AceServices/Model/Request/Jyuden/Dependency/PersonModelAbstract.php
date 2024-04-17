<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request\Jyuden;
use Plugin\AceClient\AceServices\Model\Request\Dependency\PersonModelRequestAbstract;

class PersonModelAbstract extends PersonModelRequestAbstract implements PersonModelInterface
{
     /**
     * Set Person Code
     * 
     * @param string $code
     * @return Jyuden\Dependency\PersonModelAbstract
     */
    public function setPersonCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }
    
}