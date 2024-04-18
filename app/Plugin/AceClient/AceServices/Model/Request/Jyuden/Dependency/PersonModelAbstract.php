<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Dependency\PersonModelRequestAbstract;

class PersonModelAbstract extends PersonModelRequestAbstract implements PersonModelInterface
{
     /**
     * Set Person Code
     * 
     * @param string $code
     * @return Request\Jyuden\Dependency\PersonModelAbstract
     */
    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }
    
}