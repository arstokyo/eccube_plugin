<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

use Plugin\AceClient\Util\Converter\NumberConverter;

/**
 * Trait for 内消費税
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
    public function setUtax(?string $utax): static
    {
        $this->utax = NumberConverter::stringWithCommaToFloat($utax);
        return $this;
    }
}