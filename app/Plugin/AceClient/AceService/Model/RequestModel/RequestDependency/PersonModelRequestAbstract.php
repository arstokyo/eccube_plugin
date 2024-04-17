<?php

namespace Plugin\AceClient\AceService\Model\Request\Dependency;

use Plugin\AceClient\AceService\Model\DependencyModel\PersonModelAbstract;

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
