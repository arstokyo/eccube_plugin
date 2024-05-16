<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Genka;

/**
 * Interface for Has 原価
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasGenkaInterface
{
    /**
     * Get 原価
     * 
     * @return float|null
     */
    public function getGenka(): ?float;

    /**
     * Set 原価
     * 
     * @param string|null $genka
     * @return $this
     */
    public function setGenka(?string $genka): static;
    
}