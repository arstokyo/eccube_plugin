<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

/**
 * Interface for PersonLevel3 Group 1
 * 
 * @Target : /Member/Service2.asmx/deleteHaisoAdrs
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
interface PersonLevel3G1Interface 
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
     * @param ?string $area The area.
     * @return self
     */
    public function setArea(?string $area): self;

    /**
     * Get カスタマーコード.
     *
     * @return ?string The Cbar.
     */
    public function getCbar(): ?string;

    /**
     * Set カスタマーコード.
     *
     * @param ?string $cbar The Cbar.
     * @return self
     */
    public function setCbar(?string $cbar): self;
}