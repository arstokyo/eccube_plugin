<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card;

/**
 * Interface for カード枝番レベル3
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface CardModelLevel3Interface extends CardModelLevel2Interface
{

    /**
     * Get SPSステータス
     * 
     * @return string|null
     */
    public function getSpsstatus(): ?string;

    /**
     * Set SPSステータス
     * 
     * @param string|null $spsstatus
     * @return $this
     */
    public function setSpsstatus(string|null $spsstatus): static;
}