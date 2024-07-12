<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Card;

/**
 * Interface for Has カード枝番 
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasCedaInterface
{
    /**
     * Get カード枝番
     * 
     * @return string|null
     */
    public function getCeda(): ?string;

    /**
     * Set カード枝番
     * 
     * @param string|null $ceda
     * @return $this
     */
    public function setCeda(?string $ceda);
}