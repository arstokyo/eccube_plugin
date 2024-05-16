<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

/**
 * Interface for 掛け率
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasRituInterface
{
        
    /**
    * Get 掛け率
    * 
    * @return float|null
    */
    public function getRitu(): ?float;

    /**
    * Set 掛け率
    * 
    * @param float|null $ritu
    * @return $this
    */
    public function setRitu(?float $ritu): static;

}