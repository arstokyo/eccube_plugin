<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Interface For フリーコード 名称
 * 
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
interface HasThreeFnameInterface
{
    /**
     * Get Free Code Name 1
     * 
     * @return ?string
     */
    public function getFName1(): ?string;

    /**
     * Set Free Code Name 1
     * 
     * @param ?string $FName1
     */
    public function setFName1(?string $FName1);

    /**
     * Get Free Code Name 2
     * 
     * @return ?string
     */
    public function getFName2(): ?string;

    /**
     * Set Free Code Name 2
     * 
     * @param ?string $FName2
     */
    public function setFName2(?string $FName2);

    /**
     * Get Free Code Name 3
     * 
     * @return ?string
     */
    public function getFName3(): ?string;

    /**
     * Set Free Code Name 3
     * 
     * @param ?string $FName3
     */
    public function setFName3(?string $FName3);

}