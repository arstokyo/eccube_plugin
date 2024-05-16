<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tanka;

/**
 * Interface for Has 単価
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTankaInterface
{
    /**
     * Get 単価
     * 
     * @return ?float 単価
     */
    public function getTanka(): ?float;

    /**
     * Set 単価
     * 
     * @param ?float $tanka 単価
     * @return $this
     */
    public function setTanka(?float $tanka);
}