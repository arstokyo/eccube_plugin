<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

use Plugin\AceClient\Util\Converter\NumberConverter;

/**
 * Trait for taxtotal
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TaxTotalTrait
{
        
    /** @var ?float $taxtotal 消費税合計 */
    protected ?float $taxtotal = null;

    /**
    * {@inheritDoc}
    */
    public function getTaxtotal(): ?float
    {
        return $this->taxtotal;
    }

    /**
    * {@inheritDoc}
    */
    public function setTaxtotal(?string $taxtotal)
    {
        $this->taxtotal = NumberConverter::stringWithCommaToFloat($taxtotal);
        return $this;
    }
    
}