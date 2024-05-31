<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

/**
 * Interface for Has 内税対象額（税込）
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasUTTotalInterface
{
        
    /**
    * Get 内税対象額（税込）
    * 
    * @return float|null
    */
    public function getUttotal(): ?float;

    /**
    * Set 内税対象額（税込）
    * 
    * @param string|null $uttotal
    * @return $this
    */
    public function setUttotal(?string $uttotal): static;
    
}