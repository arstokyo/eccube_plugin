<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card;

/**
 * Interface for Has カード名義人
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasCnameInterface
{
    /**
     * Get カード名義人
     * 
     * @return string|null
     */
    public function getCname(): ?string;

    /**
     * Set カード名義人
     * 
     * @param string|null $cname
     * @return $this
     */
    public function setCname(string|null $cname): static;
}