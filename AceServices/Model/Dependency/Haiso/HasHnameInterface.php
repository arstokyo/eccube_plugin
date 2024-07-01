<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

/**
 * Interface for Has 配送会社名称
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasHnameInterface
{
    /**
    * Get 配送会社名称
    *
    * @return ?string
    */
    public function getHname(): ?string;

    /**
     * Set 配送会社名称
     *
     * @param ?string $hname
     * @return $this
     */
    public function setHname(?string $hname): static;
}