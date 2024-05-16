<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Money;

use Plugin\AceClient\Utils\Converter\NumberConverter;

/**
 * Trait for 消費税金額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TaxMoneyTrait 
{

    /** @var ?float $taxmoney 消費税金額 */
    protected ?float $taxmoney = null;

    /**
     * {@inheritDoc}
     */
    public function getTaxmoney(): ?float
    {
        return $this->taxmoney;
    }

    /**
     * {@inheritDoc}
     */
    public function setTaxmoney(?string $taxmoney): static
    {
        $this->taxmoney = NumberConverter::stringWithCommaToFloat($taxmoney);
        return $this;
    }

}