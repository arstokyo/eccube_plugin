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
     * @return string|int|null 伝票種類
     */
    public function getDenku(): string|int|null;

    /**
     * Set 伝票種類
     *
     * @param string|int|null $denku 伝票種類
     * @return $this
     */
    public function setDenku(string|int|null $denku): static;
}