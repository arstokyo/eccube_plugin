<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

use Plugin\AceClient\Util\Converter\NumberConverter;

/**
 * Trait for 合計額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TotalTrait 
{
    
    /** @var ?float $total 合計額 */
    protected ?float $total = null;

    /**
     * {@inheritDoc}
     */
    public function getTotal(): ?float
    {
        return $this->total;
    }

    /**
     * {@inheritDoc}
     */
    public function setTotal(string|null $total): static
    {
        $this->total = NumberConverter::stringWithCommaToFloat($total);
        return $this;
    }   

}