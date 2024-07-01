<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Bikou;

/**
 * Interface For 3つ備考
 *
 * @author : Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
interface HasThreeBikouInterface
{
    /**
     * Get 備考1
     *
     * @return ?string
     */
    public function getBikou1(): ?string;

    /**
     * Set 備考1
     *
     * @param ?string $bikou1
     * @return $this
     */
    public function setBikou1(?string $bikou1);

    /**
     * Get 備考2
     *
     * @return ?string
     */
    public function getBikou2(): ?string;

    /**
     * Set 備考2
     *
     * @param ?string $bikou2
     * @return $this
     */
    public function setBikou2(?string $bikou2);

    /**
     * Get 備考3
     *
     * @return ?string
     */
    public function getBikou3(): ?string;

    /**
     * Set 備考3
     *
     * @param ?string $bikou3
     * @return $this
     */
    public function setBikou3(?string $bikou3);
}