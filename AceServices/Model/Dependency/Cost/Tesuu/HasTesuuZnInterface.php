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
    * @return int|null
    */
    public function getTesuuzn(): ?int;

    /**
    * Set 手数料合計
    * 
    * @param int|null $tesuuzn
    * @return $this
    */
    public function setTesuuzn(?int $tesuuzn): static;

}