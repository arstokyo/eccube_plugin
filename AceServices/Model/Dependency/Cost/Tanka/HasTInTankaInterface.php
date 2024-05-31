<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tanka;

/**
 * Interface for Has 税込み単価
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTInTankaInterface
{

    /**
     * Get 税込み単価
     * 
     * @return float|null
     */
    public function getTintanka(): ?float;

    /**
     * Set 税込み単価
     * 
     * @param string|null $tintanka
     * @return $this
     */
    public function setTintanka(?string $tintanka): static;

}