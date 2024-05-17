<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Souryou;

/**
 * Interface for Has 送料
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasSouRyouInterface
{
    /**
     * Get 送料
     *
     * @return ?float
     */
    public function getSouRyou(): ?float;

    /**
     * Set 送料
     *
     * @param ?string $souryou
     */
    public function setSouRyou(?string $souryou);
}