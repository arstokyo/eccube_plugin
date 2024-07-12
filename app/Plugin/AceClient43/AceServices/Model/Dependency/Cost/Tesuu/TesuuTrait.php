<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tesuu;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for Tesuu
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait TesuuTrait
{
    /** @var ?float $tesuu 手数料 */
    protected ?float $tesuu = null;

    /**
     * {@inheritDoc}
     */
    public function getTesuu(): ?float
    {
        return $this->tesuu;
    }

    /**
     * {@inheritDoc}
     */
    public function setTesuu(?string $tesuu)
    {
        $this->tesuu = NumberConverter::stringWithCommaToFloat($tesuu);
        return $this;
    }
}