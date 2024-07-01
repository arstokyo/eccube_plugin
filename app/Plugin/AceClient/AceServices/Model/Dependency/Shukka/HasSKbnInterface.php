<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Shukka;

/**
 * Interface for 出荷対象区分
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasSKbnInterface
{
        
    /**
    * Get 出荷対象区分
    * 
    * @return ?int
    */
    public function getSkbn() : ?int;

    /**
    * Set 出荷対象区分
    * 
    * @param ?int $skbn
    * @return $this
    */
    public function setSkbn(?int $skbn);

}