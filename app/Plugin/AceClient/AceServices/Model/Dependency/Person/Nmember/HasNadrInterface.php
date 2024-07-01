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
     * @return ?string
     */
    public function getNadr(): ?string;

    /**
     * Set 納品先住所枝番
     *
     * @param string|null $nadr
     * @return $this
     */
    public function setNadr(?string $nadr);
}