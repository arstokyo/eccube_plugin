<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Souryou;

/**
 * Interface for Has 送料
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasSouryouInterface
{
    /**
     * Get 送料
     *
     * @return ?float
     */
    public function getSouryou(): ?float;

    /**
     * Set 送料
     *
     * @param ?string $souryou
     * @return $this
     */
    public function setSouryou(?string $souryou);
}