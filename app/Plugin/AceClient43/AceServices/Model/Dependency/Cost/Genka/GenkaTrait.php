<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Genka;

use Plugin\AceClient43\Util\Converter\NumberConverter;

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
    public function setGenka(?string $genka)
    {
        $this->genka = NumberConverter::stringWithCommaToFloat($genka);
        return $this;
    }
}