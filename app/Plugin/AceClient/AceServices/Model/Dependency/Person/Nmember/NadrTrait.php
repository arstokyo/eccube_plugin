<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person\Nmember;

/**
 * Trait for 納品先住所枝番
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait NadrTrait 
{
    
    /** @var ?int $nadr 納品先住所枝番 */
    protected ?int $nadr = null;

    /**
    * {@inheritDoc}
    */
    public function getNadr(): ?int
    {
        return $this->nadr;
    }

    /**
    * {@inheritDoc}
    */
    public function setNadr(int|null $nadr): static
    {
        $this->nadr = $nadr;
        return $this;
    }   

}