<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Trait for 使用ポイント
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait PointMTrait
{
    /** @var ?int $pointm 使用ポイント */
    protected ?int $pointm = null;

    /**
     * {@inheritDoc}
     */
    public function getPointm(): ?int
    {
        return $this->pointm;
    }

    /**
     * {@inheritDoc}
     */
    public function setPointm(?int $pointm): static
    {
        $this->pointm = $pointm;
        return $this;
    }
}