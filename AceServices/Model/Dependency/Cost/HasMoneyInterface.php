<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

/**
 * Interface for Has 金額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasMoneyInterface
{
        
    /**
    * Get 金額
    * 
    * @return int|null
    */
    public function getMoney(): ?int;

    /**
    * Set 金額
    * 
    * @param int|null $money
    * @return $this
    */
    public function setMoney(?int $money): static;
    
}