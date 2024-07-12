<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Free;

/**
 * Interface For 3つフリー
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasThreeFreeInterface
{
    /**
     * Get フリー1
     */
    public function getFree1(): ?string;

    /**
     * Set フリー1
     *
     * @param string|null $free1
     * @return $this
     */
    public function setFree1(?string $free1);

    /**
     * Get フリー2
     */
    public function getFree2(): ?string;

    /**
     * Set フリー2
     *
     * @param string|null $free2
     * @return $this
     */
    public function setFree2(?string $free2);

    /**
     * Get フリー3
     */
    public function getFree3(): ?string;

    /**
     * Set フリー3
     *
     * @param string|null $free3
     * @return $this
     */
    public function setFree3(?string $free3);

}