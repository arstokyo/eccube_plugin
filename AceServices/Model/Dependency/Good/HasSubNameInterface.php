<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Interface for Has 商品 略名
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasSubNameInterface
{
    /**
     * Get 商品 略名
     *
     * @return ?string
     */
    public function getSubName(): ?string;

    /**
     * Set 商品 略名
     *
     * @param ?string $subName
     * @return $this
     */
    public function setSubName(?string $subName): static;
}