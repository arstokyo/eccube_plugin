<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tesuu;

use Plugin\AceClient\Utils\Converter\NumberConverter;

/**
 * Trait for 手数料合計
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class TesuuZnTrait 
{
    /** @var ?float $tesuuzn 手数料合計 */
    protected ?float $tesuuzn = null;

    /**
     * {@inheritDoc}
     */
    public function getTesuuzn(): ?float
    {
        return $this->tesuuzn;
    }

    /**
     * {@inheritDoc}
     */
    public function setTesuuzn(?string $tesuuzn): static
    {
        $this->tesuuzn = NumberConverter::stringWithCommaToFloat($tesuuzn);
        return $this;
    }
}