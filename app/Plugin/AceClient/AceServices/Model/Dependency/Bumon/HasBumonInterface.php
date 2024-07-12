<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Bumon;

/**
 * Interface for Has 部門
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasBumonInterface
{
      
    /**
     * Get 部門
     * 
     * @return string|null
     */
    public function getBumon(): ?string;

    /**
     * Set 部門
     * 
     * @param string|null $bumon
     * @return $this
     */
    public function setBumon(?string $bumon);
    
}