<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Interface for ポイント使用上限金額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasPointMaxInterface
{
        
        /**
        * Get ポイント使用上限金額
        * 
        * @return int|null
        */
        public function getPointmax(): ?int;
    
        /**
        * Set ポイント使用上限金額
        * 
        * @param int|null $pointmax
        * @return $this
        */
        public function setPointmax(?int $pointmax): static;
}

