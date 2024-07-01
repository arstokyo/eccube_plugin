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
    public function getPointritu(): ?float;

    /**
     * Set ポイント掛率
     * 
     * @param string|null $pointritu
     * @return $this
     */
    public function setPointritu(?string $pointritu);

}