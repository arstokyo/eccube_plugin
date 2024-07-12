<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Free;

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
    public function getFname1(): ?string;

    /**
     * Set フリーコード 名称 1
     *
     * @param ?string $fname1
     * @return $this
     */
    public function setFname1(?string $fname1);

    /**
     * Get フリーコード 名称 2
     *
     * @return ?string
     */
    public function getFname2(): ?string;

    /**
     * Set フリーコード 名称 2
     *
     * @param ?string $fname2
     * @return $this
     */
    public function setFname2(?string $fname2);

    /**
     * Get フリーコード 名称 3
     *
     * @return ?string
     */
    public function getFname3(): ?string;

    /**
     * Set フリーコード 名称 3
     *
     * @param ?string $fname3
     * @return $this
     */
    public function setFname3(?string $fname3);
}