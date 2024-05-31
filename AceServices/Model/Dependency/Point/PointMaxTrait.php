<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Trait for ポイント使用上限金額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PointMaxTrait 
{

    /** @var ?int $pointmax ポイント使用上限金額 */
    protected ?int $pointmax = null;

    /**
     * {@inheritDoc}
     */
    public function getPointmax(): ?int
    {
        return $this->pointmax;
    }

    /**
     * {@inheritDoc}
     */
    public function setPointmax(?int $pointmax): static
    {
        $this->pointmax = $pointmax;
        return $this;
    }

}