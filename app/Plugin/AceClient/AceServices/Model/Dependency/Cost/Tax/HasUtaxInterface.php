<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

/**
 * Interface for Has 内消費税
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasUtaxInterface
{
    /**
     * Get 内消費税
     *
     * @return ?int
     */
    public function getUtax(): ?int;

    /**
     * Set 内消費税
     *
     * @param ?int $utax
     */
    public function setUtax(?int $utax);
}