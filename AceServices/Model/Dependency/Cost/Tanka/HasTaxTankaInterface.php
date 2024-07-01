<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tanka;

/**
 * Interface for Has 消費税単価
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTaxTankaInterface
{

    /**
     * Get 消費税単価
     * 
     * @return float|null
     */
    public function getTaxtanka(): ?float;

    /**
     * Set 消費税単価
     * 
     * @param string|null $taxtanka
     * @return $this
     */
    public function setTaxtanka(?string $taxtanka);

}