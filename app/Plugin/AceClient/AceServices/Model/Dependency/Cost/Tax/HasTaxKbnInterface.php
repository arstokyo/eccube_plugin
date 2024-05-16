<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

/**
 * Interface for Has 税区分
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTaxKbnInterface
{
        
    /**
    * Get 税区分
    * 
    * @return int|null
    */
    public function getTaxkbn(): ?int;

    /**
    * Set 税区分
    * 
    * @param int|null $taxkbn
    * @return $this
    */
    public function setTaxkbn(?int $taxkbn): static;
    
}