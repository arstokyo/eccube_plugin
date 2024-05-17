<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tanka;

use Plugin\AceClient\Utils\Converter\NumberConverter;

/**
 * Trait for Has 消費税単価
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TaxTankaTrait 
{

    /** @var ?float $taxtanka 消費税単価 */
    protected ?float $taxtanka = null;

    /**
     * {@inheritDoc}
     */
    public function getTaxtanka(): ?float
    {
        return $this->taxtanka;
    }

    /**
     * {@inheritDoc}
     */
    public function setTaxtanka(?string $taxtanka): static
    {
        $this->taxtanka = NumberConverter::stringWithCommaToFloat($taxtanka);
        return $this;
    }

}