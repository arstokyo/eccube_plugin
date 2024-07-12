<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember;

/**
 * Trait for 納品先住所枝番
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait NadrTrait 
{
    
    /** @var ?string $nadr 納品先住所枝番 */
    protected ?string $nadr = null;

    /**
    * {@inheritDoc}
    */
    public function getNadr(): ?string
    {
        return $this->nadr;
    }

    /**
    * {@inheritDoc}
    */
    public function setNadr(?string $nadr)
    {
        $this->nadr = $nadr;
        return $this;
    }   

}