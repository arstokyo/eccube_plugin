<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tax;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for 消費税額(外税)
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait StaxTrait
{
    /** @var ?float $stax 消費税額(外税) */
    protected ?float $stax = null;

    /**
     * {@inheritDoc}
     */
    public function getStax(): ?float
    {
        return $this->stax;
    }

    /**
     * {@inheritDoc}
     */
    public function setStax(?string $stax)
    {
        $this->stax = NumberConverter::stringWithCommaToFloat($stax);
        return $this;
    }
}