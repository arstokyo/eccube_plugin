<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Nebiki;

/**
 * Interface for Has 値引合計
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasNebikiZnInteface
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
    public function setNebikizn(?string $nebikizn);
    
}