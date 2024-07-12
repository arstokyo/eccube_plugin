<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Souryou;

/**
 * Interface for Has 送料合計
 *
 * @author Ars-Phuoc <v.t.nguyen@ar-system.co.jp>
 */
interface HasSouryouZnInterface
{
    /**
     * Get 送料合計
     *
     * @return ?float
     */
    public function getSouryouzn(): ?float;

    /**
     * Set 送料合計
     *
     * @param ?string $souryouzn
     * @return $this
     */
    public function setSouryouzn(?string $souryouzn);
}