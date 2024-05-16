<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

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
    public function setPointRitu(?float $pointRitu): static
    {
        $this->pointRitu = $pointRitu;
        return $this;
    }

}