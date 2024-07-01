<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Has Web上での注文番号
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasWebOrderNoInterface
{
    /**
     * Get Web上での注文番号
     *
     * @return ?string
     */
    public function getWeborderno(): ?string;

    /**
     * Set Web上での注文番号
     *
     * @param ?string $weborderno
     * @return $this
     */
    public function setWeborderno(?string $weborderno): static;
}