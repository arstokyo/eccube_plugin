<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Dependency\PersonModelAbstract;

class PersonModelRequestAbstract extends PersonModelAbstract implements PersonModelRequestInterface
{

    /**
     * Set Person Code
     * 
     * @param string $code
     * @return Request\Dependency\PersonModelRequestAbstract
     */
    public function setPersonCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }
}
