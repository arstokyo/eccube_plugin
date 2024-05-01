<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Bikou;

/**
 * Interface For Three Bikou
 * 
 * @author : Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
interface HasThreeBikouInterface
{
    /**
     * Get 備考1
     * 
     * @return ?string
     * @return self
     */
    public function getBikou1(): ?string;

    /**
     * Set 備考1
     * 
     * @param  $bikou1
     */
    public function setBikou1(?string $bikou1);

    /**
     * Get 備考2
     * 
     * @return ?string
     * @return self
     */
    public function getBikou2(): ?string;

    /**
     * Set 備考2
     * 
     * @param ?string $bikou2
     */
    public function setBikou2(?string $bikou2);

    /**
     * Get 備考3
     * 
     * @return ?string
     * @return self
     */
    public function getBikou3(): ?string;

    /**
     * Set 備考3
     * 
     * @param ?string $bikou3
     */
    public function setBikou3(?string $bikou3);
}