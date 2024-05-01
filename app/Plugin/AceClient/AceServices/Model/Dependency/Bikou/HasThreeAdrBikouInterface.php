<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Bikou;

/**
 * Interface For Has Three Adr Bikou 
 * 
 * @Target : Plugin\AceClient\AceServices\Model\Dependency\Person
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasThreeAdrBikouInterface
{
    /**
     * Get 住所備考1
     * 
     * @return string
     */
    public function getAdrBikou1(): string;

    /**
     * Set 住所備考1
     * 
     * @param ?string $adrBikou1
     */
    public function setAdrBikou1(?string $adrBikou1);

}