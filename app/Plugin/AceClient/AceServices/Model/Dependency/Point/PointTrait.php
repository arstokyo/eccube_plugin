<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Point;

/**
 * Trait for ポイント
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PointTrait
{

    /** @var int|string|null $point ポイント */
    protected ?int $point = null;

    /**
    * {@inheritDoc}
    */
    public function getPoint(): ?int
    {
        return $this->point;
    }

    /**
    * {@inheritDoc}
    */
    public function setPoint(?int $point)
    {
        $this->point = $point;
        return $this;
    }

}
