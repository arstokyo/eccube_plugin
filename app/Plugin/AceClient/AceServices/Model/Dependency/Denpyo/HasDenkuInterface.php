<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Has 伝票種類
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasDenkuInterface
{
    /**
     * Get 伝票種類
     * 
     * @return ?int 伝票種類
     */
    public function getDenku(): ?int;

    /**
     * Set 伝票種類
     * 
     * @param ?int $denku 伝票種類
     * @return $this
     */
    public function setDenku(?int $denku);
}