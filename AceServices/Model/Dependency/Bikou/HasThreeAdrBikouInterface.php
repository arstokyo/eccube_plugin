<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Bikou;

/**
 * Interface For Has Three Adr Bikou 
 * 
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

    /**
     * Get 住所備考2
     * 
     * @return string
     */
    public function getAdrBikou2(): string;

    /**
     * Set 住所備考2
     * 
     * @param ?string $adrBikou2
     */
    public function setAdrBikou2(?string $adrBikou2);

    /**
     * Get 住所備考3
     * 
     * @return string
     */
    public function getAdrBikou3(): string;

    /**
     * Set 住所備考3
     * 
     * @param ?string $adrBikou3
     */
    public function setAdrBikou3(?string $adrBikou3);

}