<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

use Plugin\AceClient\Utils\Converter\NumberConverter;

/**
 * Trait for 外税対象額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TTotalTrait
{

    /** @var ?float $ttotal 外税対象額 */
    protected ?float $ttotal = null;

    /**
     * {@inheritDoc}
     */
    public function getTtotal(): ?float
    {
        return $this->ttotal;
    }

    /**
     * {@inheritDoc}
     */
    public function setTtotal(?string $ttotal): static
    {
        $this->ttotal = NumberConverter::stringWithCommaToFloat($ttotal);
        return $this;
    }

}