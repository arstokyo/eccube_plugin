<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Money;

/**
 * Interface for Has 消費税金額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTaxMoneyInterface
{

    /**
     * Get 消費税金額
     * 
     * @return float|null
     */
    public function getTaxmoney(): ?float;

    /**
     * Set 消費税金額
     * 
     * @param string|null $taxmoney
     * @return $this
     */
    public function setTaxmoney(?string $taxmoney);

}