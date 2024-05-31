<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Teika;

/**
 * Interface for Has 定価
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTeikaInterface
{
    
    /**
     * Get 定価
     * 
     * @return float|null
     */
    public function getTeika(): ?float;

    /**
     * Set 定価
     * 
     * @param string|null $teika
     * @return $this
     */
    public function setTeika(?string $teika): static;

}