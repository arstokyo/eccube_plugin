<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for 数量
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasSuuInterface
{

    /**
     * Get 数量
     * 
     * @return int|null
     */
    public function getSuu(): ?int;

    /**
     * Set 数量
     * 
     * @param int|null $suu
     * @return $this
     */
    public function setSuu(?int $suu);
    
}