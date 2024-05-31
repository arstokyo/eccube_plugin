<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

/**
 * Interface for 外税対象額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTTotalInterface
{
            
    /**
    * Get 外税対象額
    * 
    * @return float|null
    */
    public function getTtotal(): ?float;

    /**
    * Set 外税対象額
    * 
    * @param string|null $ttotal
    * @return $this
    */
    public function setTtotal(?string $ttotal): static; 

}