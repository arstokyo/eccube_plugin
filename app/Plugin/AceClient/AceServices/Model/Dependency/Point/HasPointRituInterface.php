<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Interface for ポイント掛率
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasPointRituInterface
{
    
    /**
     * Get ポイント掛率
     * 
     * @return float|null
     */
    public function getPointRitu(): ?float;

    /**
     * Set ポイント掛率
     * 
     * @param string|null $pointRitu
     * @return $this
     */
    public function setPointRitu(?string $pointRitu): static;

}