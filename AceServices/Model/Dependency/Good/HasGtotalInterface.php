<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Interface for Has 商品合計額
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasGtotalInterface
{
    /**
     * Get the 商品合計額.
     *
     * @return ?float The 商品合計額.
     */
    public function getGtotal(): ?float;

    /**
     * Set the 商品合計額.
     *
     * @param ?string $gtotal The 商品合計額.
     * @return $this
     */
    public function setGtotal(?string $gtotal);
}
