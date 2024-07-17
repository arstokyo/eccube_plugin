<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has 区分
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasKbnInterface
{
    /**
    * Get 区分
    *
    * @return ?int
    */
    public function getKbn(): ?int;

    /**
     * Set 区分
     *
     * @param ?int $kbn
     * @return $this
     */
    public function setKbn(?int $kbn);
}