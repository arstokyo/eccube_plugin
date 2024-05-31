<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

/**
 * Interface for Person Level 3
 *
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
interface PersonLevel3Interface
{
    /**
     * Get 地域コード.
     *
     * @return ?string The area.
     */
    public function getArea(): ?string;

    /**
     * Set 地域コード.
     *
     * @param ?string $area
     * @return $this
     */
    public function setArea(?string $area): static;

    /**
     * Get カスタマーコード.
     *
     * @return ?string The Cbar.
     */
    public function getCbar(): ?string;

    /**
     * Set カスタマーコード.
     *
     * @param ?string $cbar
     * @return $this
     */
    public function setCbar(?string $cbar): static;
}