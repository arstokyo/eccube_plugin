<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

/**
 * Person Abstract
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PersonAbstract implements PersonInterface
{
    /**
     * Code
     * 
     * @var string $code
     */
    protected string $code;
    
    /**
     * Get Code
     * 
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Set Code
     * 
     * @param string $code
     * @return self
     */
    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }
}