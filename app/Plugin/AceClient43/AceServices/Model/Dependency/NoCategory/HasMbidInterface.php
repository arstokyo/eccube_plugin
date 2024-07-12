<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has 顧客ID
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasMbidInterface
{
    /**
     * Get 顧客ID
     *
     * @return string
     */
    public function getMbid(): ?string;

    /**
     * Set 顧客ID
     *
     * @param string $mbid
     */
    public function setMbid(?string $mbid);
}