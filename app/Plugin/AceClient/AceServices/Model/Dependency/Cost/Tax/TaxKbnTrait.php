<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

/**
 * Trait for 税区分
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TaxKbnTrait
{
    /** @var ?int $taxkbn 税区分 */
    protected ?int $taxkbn = null;

    /**
     * {@inheritDoc}
     */
    public function getTaxkbn(): ?int
    {
        return $this->taxkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setTaxkbn(?int $taxkbn)
    {
        $this->taxkbn = $taxkbn;
        return $this;
    }
}