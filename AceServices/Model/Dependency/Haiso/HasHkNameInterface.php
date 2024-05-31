<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

/**
 * Interface for Has 時間指定名称
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasHkNameInterface
{
    /**
    * Get 時間指定名称
    *
    * @return ?string
    */
    public function getHkname(): ?string;

    /**
     * Set 時間指定名称
     *
     * @param ?string $hkname
     * @return $this
     */
    public function setHkname(?string $hkname): static;
}