<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

use Plugin\AceClient\Utils\Converter\NumberConverter;

/**
 * Trait for 原価
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait GenkaTrait 
{
    /**
     * 原価
     * 
     * @var ?float
     */
    protected ?float $genka = null;

    /**
     * {@inheritDoc}
     */
    public function getGenka(): ?float
    {
        return $this->genka;
    }

    /**
     * {@inheritDoc}
     */
    public function setGenka(?string $genka): static
    {
        $this->genka = NumberConverter::stringWithCommaToFloat($genka);
        return $this;
    }
}