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
     * @return ?int 単価
     */
    public function getTanka(): ?int;

    /**
     * Set 単価
     * 
     * @param ?int $tanka 単価
     * @return $this
     */
    public function setTanka(?int $tanka);
}