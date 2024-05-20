<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Souryou;

use Plugin\AceClient\Utils\Converter\NumberConverter;

/**
 * Trait for 送料
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait SouryouTrait
{
    /** @var ?float $souryou 送料 */
    protected ?float $souryou = null;

    /**
     * {@inheritDoc}
     */
    public function getSouryou(): ?float
    {
        return $this->souryou;
    }

    /**
     * {@inheritDoc}
     */
    public function setSouryou(?string $souryou): static
    {
        $this->souryou = NumberConverter::stringWithCommaToFloat($souryou);
        return $this;
    }
}