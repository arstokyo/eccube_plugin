<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Money;

/**
 * Interface for Has 税込み金額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTInMoneyInterface
{
        
    /**
    * Get 税込み金額
    * 
    * @return float|null
    */
    public function getTinmoney(): ?float;

    /**
    * Set 税込み金額
    * 
    * @param string|null $tinmoney
    * @return $this
    */
    public function setTinmoney(?string $tinmoney);

}