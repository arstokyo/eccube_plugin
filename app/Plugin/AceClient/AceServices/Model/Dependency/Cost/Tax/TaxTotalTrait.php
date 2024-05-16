<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

/**
 * Trait for taxtotal
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TaxTotalTrait 
{
        
    /** @var ?int $taxtotal 消費税合計 */
    protected ?int $taxtotal = null;

    /**
    * {@inheritDoc}
    */
    public function getTaxtotal(): ?int
    {
        return $this->taxtotal;
    }

    /**
    * {@inheritDoc}
    */
    public function setTaxtotal(?int $taxtotal): static
    {
        $this->taxtotal = $taxtotal;
        return $this;
    }
    
}