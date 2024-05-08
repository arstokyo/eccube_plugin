<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has Betu 住所区分
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasBetuInterface
{
    /**
     * Get 住所区分
     * 
     * @return ?int
     */
    public function getBetu(): ?int;

    /**
     * Set 住所区分
     * 
     * @param ?int $betu
     */
    public function setBetu(?int $betu);
}