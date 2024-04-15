<?php

namespace Plugin\AceClient\AceService\Model\Request\Dependency;

use Plugin\AceClient\AceService\Model\DependencyModel\PersonModelAbstract;

class PersonModelRequestAbstract extends PersonModelAbstract implements PersonModelRequestInterface
{

    /**
     * Get Person Code
     * 
     * @return string
     */
    public function getPersonCode() : string
    {
        return $this->code;
    }
}
