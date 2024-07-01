<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tesuu;

/**
 * Interface for Has 手数料合計
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTesuuZnInterface
{
        
    /**
    * Get 手数料合計
    * 
    * @return float|null
    */
    public function getTesuuzn(): ?float;

    /**
    * Set 手数料合計
    * 
    * @param string|null $tesuuzn
    * @return $this
    */
    public function setTesuuzn(?string $tesuuzn);

}