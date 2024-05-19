<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Trait for PointP
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait PointPTrait
{
    /** @var ?int $pointp 加算ポイント */
    protected ?int $pointp = null;

    /**
     * {@inheritDoc}
     */
    public function getPointp(): ?int
    {
        return $this->pointp;
    }

    /**
     * {@inheritDoc}
     */
    public function setPointp(?int $pointp)
    {
        $this->pointp = $pointp;
        return $this;
    }
}