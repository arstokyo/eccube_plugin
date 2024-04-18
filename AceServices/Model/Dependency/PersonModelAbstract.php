<?php

namespace Plugin\AceClient\AceServices\Model\Dependency;

use Plugin\AceClient\AceServices\Model;

abstract  class PersonModelAbstract implements PersonModelInterface
{
    
    /** @var string Person Code  */
    protected string $code;

    /**
     * Get 顧客コード
     * 
     * @return string
     */
    public function getPersonCode(): string
    {
        return $this->code;
    }

    /**
     * Set 顧客コード
     * 
     * @param string $code
     * @return Model\Dependency\PersonModelInterface
     */
    public function setPersonCode(string $code): PersonModelInterface
    {
        $this->code = $code;
        return $this;
    }

}