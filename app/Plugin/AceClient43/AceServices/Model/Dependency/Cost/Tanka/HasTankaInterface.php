<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tanka;

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
     * @param ?string $tanka 単価
     * @return $this
     */
    public function setTanka(?string $tanka);
}