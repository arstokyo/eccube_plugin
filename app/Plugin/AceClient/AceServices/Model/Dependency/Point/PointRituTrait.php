<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Point;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for ポイント掛率
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PointRituTrait 
{
   
    /** @var ?float $pointritu ポイント掛率 */
    protected ?float $pointritu = null;

    /**
     * {@inheritDoc}
     */
    public function getPointritu(): ?float
    {
        return $this->pointRitu;
    }

    /**
     * {@inheritDoc}
     */
    public function setPointritu(?string $pointritu)
    {
        $this->pointRitu = NumberConverter::stringWithCommaToFloat($pointritu);
        return $this;
    }

}