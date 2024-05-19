<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Baitai;

/**
 * Interface for Has 媒体管理コード
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasBkCodeInterface
{
    /**
     * Get 媒体管理コード
     * 
     * @return ?string
     */
    public function getBkcode(): ?string;

    /**
     * Set 媒体管理コード
     * 
     * @param ?string $bkcode
     * @return $this
     */
    public function setBkcode(?string $bkcode): static;
}