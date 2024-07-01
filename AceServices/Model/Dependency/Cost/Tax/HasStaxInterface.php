<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

/**
 * Interface for Has 消費税額(外税)
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasStaxInterface
{
    /**
     * Get 消費税額(外税)
     *
     * @return ?float
     */
    public function getStax(): ?float;

    /**
     * Set 消費税額(外税)
     *
     * @param ?string $stax
     * @return $this
     */
    public function setStax(?string $stax);
}