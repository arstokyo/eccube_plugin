<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\NeBiki;

/**
 * Interface for Has 値引額
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasNebikiInterface
{
    /**
     * Get 値引額
     *
     * @return ?int
     */
    public function getNebiki(): ?int;

    /**
     * Set 値引額
     *
     * @param ?int $nebiki
     */
    public function setNebiki(?int $nebiki);
}