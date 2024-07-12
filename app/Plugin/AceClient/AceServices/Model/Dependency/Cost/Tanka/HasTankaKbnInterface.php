<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tanka;

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
    public function getTankakbn(): ?int;

    /**
    * Set 単価区分
    * 
    * @param int|null $tankakbn
    * @return $this
    */
    public function setTankakbn(?int $tankakbn);
    
}