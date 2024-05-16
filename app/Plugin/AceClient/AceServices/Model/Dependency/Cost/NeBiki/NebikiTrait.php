<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\NeBiki;

use Plugin\AceClient\Utils\Converter\NumberConverter;

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
    public function setNebiki(?string $nebiki)
    {
        $this->nebiki = NumberConverter::stringWithCommaToFloat($nebiki);
        return $this;
    }
}