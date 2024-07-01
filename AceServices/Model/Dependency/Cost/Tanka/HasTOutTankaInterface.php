<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tanka;

/**
 * Interface for Has 税抜き単価
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTOutTankaInterface
{
        
    /**
    * Get 税抜き単価
    * 
    * @return float|null
    */
    public function getTouttanka(): ?float;

    /**
    * Set 税抜き単価
    * 
    * @param string|null $touttanka
    * @return $this
    */
    public function setTouttanka(?string $touttanka);

}