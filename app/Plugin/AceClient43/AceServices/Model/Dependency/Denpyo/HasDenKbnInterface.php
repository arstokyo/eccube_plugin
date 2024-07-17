<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Has 伝票区分
 * 
 */
interface HasDenKbnInterface
{
    /**
     * Get 伝票区分
     *
     * @return ?string
     */
    public function getDenkbn(): ?string;

    /**
     * Set 伝票区分
     *
     * @param ?string $denkbn
     * @return $this
     */
    public function setDenkbn(?string $denkbn);
}