<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

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
     * @return ?int
     */
    public function getTesuu(): ?int;

    /**
     * Set 手数料
     *
     * @param ?int $tesuu
     */
    public function setTesuu(?int $tesuu);
}