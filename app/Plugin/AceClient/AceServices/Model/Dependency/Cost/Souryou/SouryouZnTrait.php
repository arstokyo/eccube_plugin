<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Souryou;

use Plugin\AceClient\Utils\Converter\NumberConverter;

/**
 * Trait for Has 送料合計
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait SouryouZnTrait 
{

    /** @var ?float $souryouzn 送料合計 */
    protected ?float $souryouzn = null;

    /**
     * {@inheritDoc}
     */
    public function getSouryouzn(): ?float
    {
        return $this->souryouzn;
    }

    /**
     * {@inheritDoc}
     */
    public function setSouryouzn(?string $souryouzn): static
    {
        $this->souryouzn = NumberConverter::stringWithCommaToFloat($souryouzn);
        return $this;
    }
}