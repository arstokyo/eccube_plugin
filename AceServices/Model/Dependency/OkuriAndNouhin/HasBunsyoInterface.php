<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\OkuriAndNouhin;

/**
 * Interface for 文章指定コード
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasBunsyoInterface
{
    
    /**
     * Get 文章指定コード
     * 
     * @return ?int
     */
    public function getBunsyo() : ?int;

    /**
     * Set 文章指定コード
     * 
     * @param ?int $bunsyo
     * @return $this
     */
    public function setBunsyo(?int $bunsyo): static;

}