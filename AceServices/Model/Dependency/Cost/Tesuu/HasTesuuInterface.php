<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tesuu;

/**
 * Interface for Has 手数料
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasTesuuInterface
{
    /**
     * Get 手数料
     *
     * @return ?float
     */
    public function getTesuu(): ?float;

    /**
     * Set 手数料
     *
     * @param ?string $tesuu
     */
    public function setTesuu(?string $tesuu);
}