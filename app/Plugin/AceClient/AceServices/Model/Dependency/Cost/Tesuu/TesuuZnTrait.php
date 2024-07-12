<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tesuu;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for 手数料合計
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TesuuZnTrait 
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
    public function setTesuuzn(?string $tesuuzn)
    {
        $this->tesuuzn = NumberConverter::stringWithCommaToFloat($tesuuzn);
        return $this;
    }
}