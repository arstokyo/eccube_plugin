<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Trait for PointM
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait PointMTrait
{
    /** @var ?int $pointM 使用ポイント */
    protected ?int $pointM = null;

    /**
     * {@inheritDoc}
     */
    public function getPointM(): ?int
    {
        return $this->pointM;
    }

    /**
     * {@inheritDoc}
     */
    public function setPointM(?int $pointM)
    {
        $this->pointM = $pointM;
        return $this;
    }
}