<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tax;

/**
 * Interface for Has 消費税合計
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTaxTotalInterface
{
    
    /**
     * Get 消費税合計
     * 
     * @return float|null
     */
    public function getTaxtotal(): ?float;

    /**
     * Set 消費税合計
     * 
     * @param string|null $taxtotal
     * @return $this
     */
    public function setTaxtotal(?string $taxtotal);
    
}