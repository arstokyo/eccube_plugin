<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\OkuriAndNouhin;

/**
 * Interface for Has 送り主
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasOkuriNusiInterface
{
    /**
     * Get 送り主
     * 
     * @return ?string
     */
    public function getOkurinusi(): ?string;

    /**
     * Set 送り主
     * 
     * @param ?string $okurinusi
     * @return $this
     */
    public function setOkurinusi(?string $okurinusi);
}