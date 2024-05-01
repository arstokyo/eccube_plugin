<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Interface For 3つフリーフリーコード
 * 
 * @author Ars-Thong<v.t.nguyen@ar-system.co.jp>
 */
interface HasThreeFcodeInterface
{
    /**
     * Get Free Code 1
     * 
     * @return ?string
     */
    public function getFCode1(): ?string;

    /**
     * Set Free Code 1
     * 
     * @param ?string $freeCode1
     */
    public function setFCode1(?string $freeCode1);

    /**
     * Get Free Code 2
     * 
     * @return ?string
     */
    public function getFCode2(): ?string;

    /**
     * Set Free Code 2
     * 
     * @param ?string $freeCode2
     */
    public function setFCode2(?string $freeCode2);

    /**
     * Get Free Code 3
     * 
     * @return ?string
     */
    public function getFCode3(): ?string;

    /**
     * Set Free Code 3
     * 
     * @param ?string $freeCode3
     */
    public function setFCode3(?string $freeCode3);

}