<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Address;

/**
 * Interface for Has 住所
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasAdrInterface
{
    /**
     * Get 住所
     *
     * @return ?string
     */
    public function getAdr(): ?string;

    /**
     * Set 住所
     *
     * @param ?string $adr
     * @return $this
     */
    public function setAdr(?string $adr);
}