<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

/**
 * Check for Has 配送時間ID
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */
interface HasHkCodeInterface
{
    /**
     * Get 配送時間ID
     * 
     * @return ?int
     */
    public function getHkCode(): ?int;

    /**
     * Set 配送時間ID
     * 
     * @param ?int $hkCode
     * @return $this
     */
    public function setHkCode(?int $hkCode): static;
}