<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

/**
 * Interface for Has 配送方法コード
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasHcodeInterface
{
    /**
    * Get 配送方法コード
    *
    * @return ?int
    */
    public function getHcode(): ?int;

    /**
     * Set 配送方法コード
     *
     * @param ?int $hcode
     * @return $this
     */
    public function setHcode(?int $hcode): static;
}