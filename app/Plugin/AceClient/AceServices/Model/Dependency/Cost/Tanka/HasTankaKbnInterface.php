<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tanka;

/**
 * Interface for 単価区分
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTankaKbnInterface
{
        
    /**
    * Get 単価区分
    * 
    * @return int|null
    */
    public function getTankaKbn(): ?int;

    /**
    * Set 単価区分
    * 
    * @param int|null $tankaKbn
    * @return $this
    */
    public function setTankaKbn(?int $tankaKbn): static;
    
}