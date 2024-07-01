<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

use Plugin\AceClient\Util\Converter\NumberConverter;

/**
 * Trait for 内税対象額（税込）
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait UTTotalTrait 
{
            
    /** @var ?float $uttotal 内税対象額（税込） */
    protected ?float $uttotal = null;

    /**
    * {@inheritDoc}
    */
    public function getUttotal(): ?float
    {
        return $this->uttotal;
    }

    /**
    * {@inheritDoc}
    */
    public function setUttotal(?string $uttotal)
    {
        $this->uttotal = NumberConverter::stringWithCommaToFloat($uttotal);
        return $this;
    }
    
}