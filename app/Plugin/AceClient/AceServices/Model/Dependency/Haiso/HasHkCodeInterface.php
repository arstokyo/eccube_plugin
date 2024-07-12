<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Haiso;

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
    public function getHkcode(): ?int;

    /**
     * Set 配送時間ID
     * 
     * @param ?int $hkcode
     * @return $this
     */
    public function setHkcode(?int $hkcode);
}