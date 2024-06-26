<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Nebiki;

use Plugin\AceClient\Util\Converter\NumberConverter;

/**
 * Trait for NebikiTrait
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait NebikiTrait
{
    /** @var ?float $nebiki 値引額 */
    protected ?float $nebiki = null;

    /**
     * {@inheritDoc}
     */
    public function getNebiki(): ?float
    {
        return $this->nebiki;
    }

    /**
     * {@inheritDoc}
     */
    public function setNebiki(?string $nebiki): static
    {
        $this->nebiki = NumberConverter::stringWithCommaToFloat($nebiki);
        return $this;
    }
}