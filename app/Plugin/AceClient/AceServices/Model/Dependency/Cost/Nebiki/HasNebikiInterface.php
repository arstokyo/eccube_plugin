<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Nebiki;

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
     * @return ?float
     */
    public function getNebiki(): ?float;

    /**
     * Set 値引額
     *
     * @param ?string $nebiki
     * @return $this
     */
    public function setNebiki(?string $nebiki): static;
}
