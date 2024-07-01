<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Interface for Has 商品名
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasGNameInterface
{
    /**
     * Get 商品名
     *
     * @return ?string
     */
    public function getGname(): ?string;

    /**
     * Set 商品名
     *
     * @param ?string $gname
     * @return $this
     */
    public function setGname(?string $gname);
}