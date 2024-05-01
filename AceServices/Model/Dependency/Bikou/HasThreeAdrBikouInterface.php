<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Bikou;

/**
 * Interface For 3つ住所備考
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
    public function getAdrBikou1(): ?string;

    /**
     * Set 住所備考1
     * 
     * @param ?string $adrbikou1
     */
    public function setAdrBikou1(?string $adrbikou1);

    /**
     * Get 住所備考2
     * 
     * @return string
     */
    public function getAdrBikou2(): ?string;

    /**
     * Set 住所備考2
     * 
     * @param ?string $adrbikou2
     */
    public function setAdrBikou2(?string $adrbikou2);

    /**
     * Get 住所備考3
     * 
     * @return string
     */
    public function getAdrBikou3(): ?string;

    /**
     * Set 住所備考3
     * 
     * @param ?string $adrbikou3
     */
    public function setAdrBikou3(?string $adrbikou3);

}