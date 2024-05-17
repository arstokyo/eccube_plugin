<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Souryou;

use Plugin\AceClient\Utils\Converter\NumberConverter;

/**
 * Trait for SouRyou
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait SouRyouTrait 
{
    /** @var ?float $souryou 送料 */
    protected ?float $souryou = null;

    /**
     * {@inheritDoc}
     */
    public function getSouRyou(): ?float
    {
        return $this->souryou;
    }

    /**
     * {@inheritDoc}
     */
    public function setSouRyou(?string $souryou)
    {
        $this->souryou = NumberConverter::stringWithCommaToFloat($souryou);
        return $this;
    }
}