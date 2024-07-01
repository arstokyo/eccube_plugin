<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

use Plugin\AceClient\Util\Converter\NumberConverter;

/**
 * Trait for Gtotal
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait GtotalTrait 
{
    /** @var ?float $gtotal 商品合計額 */
    protected ?float $gtotal = null;

    /**
     * {@inheritDoc}
     */
    public function getGtotal(): ?float
    {
        return $this->gtotal;
    }

    /**
     * {@inheritDoc}
     */
    public function setGtotal(?string $gtotal): static
    {
        $this->gtotal = NumberConverter::stringWithCommaToFloat($gtotal);
        return $this;
    }
}