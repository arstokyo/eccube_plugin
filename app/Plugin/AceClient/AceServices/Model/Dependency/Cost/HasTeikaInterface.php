<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

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
     * @return int|null
     */
    public function getTeika(): ?int;

    /**
     * Set 定価
     * 
     * @param int|null $teika
     * @return $this
     */
    public function setTeika(?int $teika): static;

}