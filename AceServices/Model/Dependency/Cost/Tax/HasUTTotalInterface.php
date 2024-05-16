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
    * @return int|null
    */
    public function getUttotal(): ?int;

    /**
    * Set 内税対象額（税込）
    * 
    * @param int|null $uttotal
    * @return $this
    */
    public function setUttotal(?int $uttotal): static;
    
}