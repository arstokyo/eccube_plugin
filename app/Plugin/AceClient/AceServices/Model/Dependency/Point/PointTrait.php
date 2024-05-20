<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Trait for ポイント
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PointTrait
{

    /** @var int|string|null $point ポイント */
    protected int|string|null $point = null;

    /**
    * {@inheritDoc}
    */
    public function getPoint(): int|string|null
    {
        return $this->point;
    }

    /**
    * {@inheritDoc}
    */
    public function setPoint(int|string|null $point): static
    {
        $this->point = $point;
        return $this;
    }

}
