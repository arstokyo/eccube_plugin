<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card;

use Plugin\AceClient\AceServices\Model\Dependency\Card\GMo\HasGMOStatusInterface;

/**
 * Interface for Card Level 3
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface CardModelLevel3ExtractInterface extends CardModelLevel3Interface
{

    /**
     * Get SPSステータス
     * 
     * @return int|null
     */
    public function getSpsstatus(): ?int;

    /**
     * Set SPSステータス
     * 
     * @param int|null $spsstatus
     * @return $this
     */
    public function setSpsstatus(int|null $spsstatus): static;

    /**
     * Get ペイジェント決済ID
     * 
     * @return string|null
     */
    public function getPgtkid(): ?string;

    /**
     * Set ペイジェント決済ID
     * 
     * @param string|null $pgtkid
     * @return $this
     */
    public function setPgtkid(string|null $pgtkid): static;

    /**
     * Get ペイジェント決済ステータス
     * 
     * @return int|null
     */
    public function getPgtstatus(): ?int;

    /**
     * Set ペイジェント決済ステータス
     * 
     * @param int|null $pgtstatus
     * @return $this
     */
    public function setPgtstatus(?int $pgtstatus): static;

    
}