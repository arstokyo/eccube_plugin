<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Interface For 3つフリーコード 名称
 * 
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
interface HasThreeFnameInterface
{
    /**
     * Get フリーコード 名称 1
     * 
     * @return ?string
     */
    public function getFName1(): ?string;

    /**
     * Set フリーコード 名称 1
     * 
     * @param ?string $fname1
     */
    public function setFName1(?string $fname1);

    /**
     * Get フリーコード 名称 2
     * 
     * @return ?string
     */
    public function getFName2(): ?string;

    /**
     * Set フリーコード 名称 2
     * 
     * @param ?string $fname2
     */
    public function setFName2(?string $fname2);

    /**
     * Get フリーコード 名称 3
     * 
     * @return ?string
     */
    public function getFName3(): ?string;

    /**
     * Set フリーコード 名称 3
     * 
     * @param ?string $fname3
     */
    public function setFName3(?string $fname3);

}