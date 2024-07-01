<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Money;

/**
 * Interface for Has 税抜き金額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTOutMoneyInterface
{
    
    /**
     * Get 税抜き金額
     * 
     * @return float|null
     */
    public function getToutmoney(): ?float;

    /**
     * Set 税抜き金額
     * 
     * @param string|null $toutmoney
     * @return $this
     */
    public function setToutmoney(?string $toutmoney);

}