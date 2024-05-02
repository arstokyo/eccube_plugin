<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

/**
 * Trait for Person Level 1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PersonLevel1Trait
{

    /** @var ?string $code 顧客コード  */
    protected ?string $code = null;
    
    /**
     * {@inheritDoc}
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * {@inheritDoc}
     */
    public function setCode(?string $code)
    {
        $this->code = $code;
        return $this;
    }

}