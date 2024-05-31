<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has フリガナ
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasKanaInterface
{
    /**
     * Get フリガナ
     *
     */
    public function getKana(): ?string;

    /**
     * Set フリガナ
     *
     * @param ?string $kana
     * @return $this
     */
    public function setKana(?string $kana): static;
}