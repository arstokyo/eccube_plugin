<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Has 伝票番号
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasDennoInterface
{
    /**
     * Get 伝票番号.
     *
     * @return ?int
     */
    public function getDenno(): ?int;

    /**
     * Set 伝票番号.
     *
     * @param ?int $denno 伝票番号
     * @return $this
     */
    public function setDenno(?int $denno): static;
}