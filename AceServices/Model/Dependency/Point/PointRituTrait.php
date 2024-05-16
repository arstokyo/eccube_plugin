<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

use Plugin\AceClient\Utils\Converter\NumberConverter;

/**
 * Trait for ポイント掛率
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PointRituTrait 
{
   
    /** @var ?float $pointRitu ポイント掛率 */
    protected ?float $pointRitu = null;

    /**
     * {@inheritDoc}
     */
    public function getPointRitu(): ?float
    {
        return $this->pointRitu;
    }

    /**
     * {@inheritDoc}
     */
    public function setPointRitu(?string $pointRitu): static
    {
        $this->pointRitu = NumberConverter::stringWithCommaToFloat($pointRitu);
        return $this;
    }

}