<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\AceServices\Model\Dependency\PersonModelAbstract;

class PersonModelRequestAbstract extends PersonModelAbstract implements PersonModelRequestInterface
{

    /**
     * Set Person Code
     * 
     * @param string $code
     */
    public function setPersonCode(string $code) 
    {
        $this->code = $code;
    }
}
