<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

/**
 * Trait for 外税消費税
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TaxTrait
{
    /** @var ?int $tax 消費税 */
    protected ?int $tax = null;

    /**
     * {@inheritDoc}
     */
    public function getTax(): ?int
    {
        return $this->tax;
    }

    /**
     * {@inheritDoc}
     */
    public function setTax(?int $tax): static
    {
        $this->tax = $tax;
        return $this;
    }
}