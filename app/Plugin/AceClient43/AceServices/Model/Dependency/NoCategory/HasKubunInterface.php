<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has フリー項目区分
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasKubunInterface
{
    /**
    * Get フリー項目区分
    *
    * @return ?int
    */
    public function getKubun(): ?int;

    /**
     * Set フリー項目区分
     *
     * @param ?int $kubun
     * @return $this
     */
    public function setKubun(?int $kubun);
}