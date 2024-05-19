<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person\Nmember;

/**
 * Interface for 納品先住所枝番
 * 
 * @author Ars-Thong <v.t.nguyen@ar-sysytem.co.jp>
 */
interface HasNadrInterface
{
    /**
     * Get 納品先住所枝番
     *
     * @return ?int
     */
    public function getNadr(): ?int;

    /**
     * Set 納品先住所枝番
     *
     * @param int|null $nadr
     * @return $this
     */
    public function setNadr(int|null $nadr): static;
}