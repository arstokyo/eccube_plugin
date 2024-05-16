<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

use Plugin\AceClient\Utils\Converter\NumberConverter;

/**
 * Trait for Utax
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait UtaxTrait 
{
    /** @var ?float $utax 内消費税 */
    protected ?float $utax = null;

    /**
     * {@inheritDoc}
     */
    public function getUtax(): ?float
    {
        return $this->utax;
    }

    /**
     * {@inheritDoc}
     */
    public function setUtax(?string $utax)
    {
        $this->utax = NumberConverter::stringWithCommaToFloat($utax);
        return $this;
    }
}