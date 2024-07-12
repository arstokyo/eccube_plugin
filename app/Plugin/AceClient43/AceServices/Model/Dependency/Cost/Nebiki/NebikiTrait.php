<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Nebiki;

use Plugin\AceClient43\Util\Converter\NumberConverter;

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