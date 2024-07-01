<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Money;

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
    * @return float|null
    */
    public function getMoney(): ?float;

    /**
    * Set 金額
    * 
    * @param string|null $money
    * @return $this
    */
    public function setMoney(?string $money);
    
}