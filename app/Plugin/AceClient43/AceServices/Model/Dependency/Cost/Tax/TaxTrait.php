<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tax;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for 外税消費税
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TaxTrait 
{
    /** @var ?float $tax 消費税 */
    protected ?float $tax = null;

    /**
     * {@inheritDoc}
     */
    public function getTax(): ?float
    {
        return $this->tax;
    }

    /**
     * {@inheritDoc}
     */
    public function setTax(?string $tax)
    {
        $this->tax = NumberConverter::stringWithCommaToFloat($tax);
        return $this;
    }
}