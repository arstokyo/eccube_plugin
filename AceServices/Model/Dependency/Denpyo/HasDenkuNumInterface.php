<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Has 伝票フラグ
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasDenkuNumInterface
{
    /**
     * Get 伝票フラグ
     *
     * @return ?int
     */
    public function getDenkuNum(): ?int;

    /**
     * Set 伝票フラグ
     *
     * @param ?int $denkuNum
     * @return $this
     */
    public function setDenkuNum(?int $denkuNum): static;
}