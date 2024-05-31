<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

/**
 * Interface for Has 配送伝票略称
 * 
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */

interface HasOsubnameInterface
{
    /**
     * Get 配送伝票略称 Osubname
     * 
     * @return ?string
     */
    public function getOsubname(): ?string;


    /**
     * Set 配送伝票略称 Osubname
     * 
     * @param ?string $subname
     * @return $this
     */
    public function setOsubname(?string $subname): static;
}