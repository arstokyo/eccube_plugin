<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\NeBiki;

/**
 * Interface for Has 値引合計
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasNeBikiZnInteface
{
            
    /**
    * Get 値引合計
    * 
    * @return float|null
    */
    public function getNebikizn(): ?float;

    /**
    * Set 値引合計
    * 
    * @param string|null $nebikizn
    * @return $this
    */
    public function setNebikizn(?string $nebikizn): static;
    
}