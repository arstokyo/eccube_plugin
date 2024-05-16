<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

use Plugin\AceClient\Utils\Converter\NumberConverter;

/**
 * Trait for 掛け率
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait RituTrait
{

    /** @var float|null $ritu 掛け率 */
    protected ?float $ritu = null;

    /**
     * {@inheritDoc}
     */
    public function getRitu(): ?float
    {
        return $this->ritu;
    }

    /**
     * {@inheritDoc}
     */
    public function setRitu(?string $ritu): static
    {
        $this->ritu = NumberConverter::stringWithCommaToFloat($ritu);
        return $this;
    }

}