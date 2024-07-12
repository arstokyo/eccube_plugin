<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

/**
 * Interface for Has 商品ID
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasGdidInterface
{
    /**
     * Get 商品ID
     *
     * @return ?string
     */
    public function getGdid(): ?string;

    /**
     * Set 商品ID
     *
     * @param ?string $gdid
     * @return $this
     */
    public function setGdid(?string $gdid);
}