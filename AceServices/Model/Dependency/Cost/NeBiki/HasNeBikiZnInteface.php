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
    * @return int|null
    */
    public function getNebikizn(): ?int;

    /**
    * Set 値引合計
    * 
    * @param int|null $nebikizn
    * @return $this
    */
    public function setNebikizn(?int $nebikizn): static;
    
}