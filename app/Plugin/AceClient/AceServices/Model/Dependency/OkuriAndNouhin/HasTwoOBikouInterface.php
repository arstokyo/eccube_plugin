<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\OkuriAndNouhin;

/**
 * Interface for Has 2送り状備考
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTwoOBikouInterface
{
    /**
     * Get 送り状備考1
     * 
     * @return ?string
     */
    public function getObikou1(): ?string;

    /**
     * Set 送り状備考1
     * 
     * @param ?string $obikou1
     * @return $this
     */
    public function setObikou1(?string $obikou1): static;

    /**
     * Get 送り状備考2
     * 
     * @return ?string
     */
    public function getObikou2(): ?string;

    /**
     * Set 送り状備考2
     * 
     * @param ?string $obikou2
     * @return $this
     */
    public function setObikou2(?string $obikou2): static;
    
}
