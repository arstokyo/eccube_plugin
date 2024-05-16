<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

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
     * @return int|null
     */
    public function getGenka(): ?int;

    /**
     * Set 原価
     * 
     * @param int|null $genka
     * @return $this
     */
    public function setGenka(?int $genka): static;
    
}