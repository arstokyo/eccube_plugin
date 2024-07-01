<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

/**
 * Interface for Has 合計額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTotalInterface
{
    /**
     * Get 合計額
     *
     * @return ?float
     */
    public function getTotal(): ?float;

    /**
     * Set 合計額
     *
     * @param string|null $total
     * @return $this
     */
    public function setTotal(?string $total);
    
}