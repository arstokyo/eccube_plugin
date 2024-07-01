<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Interface For 3つフリーコード
 *
 * @author Ars-Thong<v.t.nguyen@ar-system.co.jp>
 */
interface HasThreeFcodeInterface
{
    /**
     * Get フリーコード 1
     *
     * @return ?string
     */
    public function getFcode1(): ?string;

    /**
     * Set フリーコード 1
     *
     * @param ?string $fcode1
     * @return $this
     */
    public function setFcode1(?string $fcode1);

    /**
     * Get フリーコード 2
     *
     * @return ?string
     */
    public function getFcode2(): ?string;

    /**
     * Set フリーコード 2
     *
     * @param ?string $fcode2
     * @return $this
     */
    public function setFcode2(?string $fcode2);

    /**
     * Get フリーコード 3
     *
     * @return ?string
     */
    public function getFcode3(): ?string;

    /**
     * Set フリーコード 3
     *
     * @param ?string $fcode3
     * @return $this
     */
    public function setFcode3(?string $fcode3);
}