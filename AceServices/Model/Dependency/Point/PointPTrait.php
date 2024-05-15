<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Trait for PointP
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait PointPTrait
{
    /** @var ?int $pointP 加算ポイント */
    protected ?int $pointP = null;

    /**
     * {@inheritDoc}
     */
    public function getPointP(): ?int
    {
        return $this->pointP;
    }

    /**
     * {@inheritDoc}
     */
    public function setPointP(?int $pointP)
    {
        $this->pointP = $pointP;
        return $this;
    }
}