<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Hs DM区分
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasDmKbnInterface
{
    /**
     * Get DM区分
     *
     * @return ?int
     */
    public function getDmkbn(): ?int;

    /**
     * Set DM区分
     *
     * @param ?int $dmkbn
     * @return $this
     */
    public function setDmkbn(?int $dmkbn): static;
}