<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\AceServices\Model\Dependency\PersonModelAbstract;

class PersonModelRequestAbstract extends PersonModelAbstract implements PersonModelRequestInterface
{

    /**
     * Set Person Code
     * 
     * @param string $code
     * @return PersonModelRequestAbstract
     */
    public function setPersonCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }
}
