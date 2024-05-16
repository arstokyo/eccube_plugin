<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

/**
 * Interface for Has 外税消費税
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTaxInterface
{
        
    /**
    * Get 外税消費税
    * 
    * @return int|null
    */
    public function getTax(): ?int;

    /**
    * Set 外税消費税
    * 
    * @param int|null $tax
    * @return $this
    */
    public function setTax(?int $tax): static;
    
}
