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
    * @return float|null
    */
    public function getTax(): ?float;

    /**
    * Set 外税消費税
    * 
    * @param string|null $tax
    * @return $this
    */
    public function setTax(?string $tax);
    
}
