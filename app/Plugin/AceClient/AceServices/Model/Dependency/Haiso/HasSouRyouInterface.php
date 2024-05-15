<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

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
     * @return ?int
     */
    public function getSouRyou(): ?int;

    /**
     * Set 送料
     *
     * @param ?int $souryou
     */
    public function setSouRyou(?int $souryou);
}