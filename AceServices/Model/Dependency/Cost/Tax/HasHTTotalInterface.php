<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

/**
 * Interface for Has 非課税対象額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasHTTotalInterface
{
            
    /**
    * Get 非課税対象額
    * 
    * @return float|null
    */
    public function getHttotal(): ?float;

    /**
    * Set 非課税対象額
    * 
    * @param string|null $httotal
    * @return $this
    */
    public function setHttotal(?string $httotal): static;
    
}