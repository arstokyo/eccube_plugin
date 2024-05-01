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
    public function getFCode1(): ?string;

    /**
     * Set フリーコード 1
     * 
     * @param ?string $fcode1
     */
    public function setFCode1(?string $fcode1);

    /**
     * Get フリーコード 2
     * 
     * @return ?string
     */
    public function getFCode2(): ?string;

    /**
     * Set フリーコード 2
     * 
     * @param ?string $fcode2
     */
    public function setFCode2(?string $fcode2);

    /**
     * Get フリーコード 3
     * 
     * @return ?string
     */
    public function getFCode3(): ?string;

    /**
     * Set フリーコード 3
     * 
     * @param ?string $fcode3
     */
    public function setFCode3(?string $fcode3);

}