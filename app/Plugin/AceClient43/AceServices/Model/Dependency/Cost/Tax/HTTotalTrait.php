<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tax;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for 非課税対象額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait HTTotalTrait
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
    public function setHttotal(?string $httotal)
    {
        $this->httotal = NumberConverter::stringWithCommaToFloat($httotal);
        return $this;
    }

}