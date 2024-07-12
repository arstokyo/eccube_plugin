<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Baitai;

/**
 * Interface for Has 媒体コード
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasBcodeInterface
{
    /**
     * Get 媒体コード
     * 
     * @return ?string
     */
    public function getBcode(): ?string;

    /**
     * Set 媒体コード
     * 
     * @param ?string $bcode
     * @return $this
     */
    public function setBcode(?string $bcode);
}