<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Has 伝票種別
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasDensyuInterface
{
    /**
     * Get 伝票種別
     *
     * @return ?int
     */
    public function getDensyu(): ?int;

    /**
     * Set 伝票種別
     *
     * @param ?int $densyu
     * @return $this
     */
    public function setDensyu(?int $densyu);
}
