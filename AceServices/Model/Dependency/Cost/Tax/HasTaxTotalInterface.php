<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

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
     * @return int|null
     */
    public function getTaxtotal(): ?int;

    /**
     * Set 消費税合計
     * 
     * @param int|null $taxtotal
     * @return $this
     */
    public function setTaxtotal(?int $taxtotal): static;
    
}