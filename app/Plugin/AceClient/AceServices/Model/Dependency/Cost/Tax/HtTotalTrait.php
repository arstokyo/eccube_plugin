<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

use Plugin\AceClient\Utils\Converter\NumberConverter;

/**
 * Trait for 非課税対象額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait HtTotalTrait
{
                
    /** @var ?float $httotal 非課税対象額 */
    protected ?float $httotal = null;

    /**
    * {@inheritDoc}
    */
    public function getHttotal(): ?float
    {
        return $this->httotal;
    }

    /**
    * {@inheritDoc}
    */
    public function setHttotal(?string $httotal): static
    {
        $this->httotal = NumberConverter::stringWithCommaToFloat($httotal);
        return $this;
    }

}