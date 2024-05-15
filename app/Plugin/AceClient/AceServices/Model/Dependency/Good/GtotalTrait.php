<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Trait for Gtotal
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait GtotalTrait
{
    /** @var ?int $gtotal 商品合計額 */
    protected ?int $gtotal = null;

    /**
     * {@inheritDoc}
     */
    public function getGtotal(): ?int
    {
        return $this->gtotal;
    }

    /**
     * {@inheritDoc}
     */
    public function setGtotal(?int $gtotal)
    {
        $this->gtotal = $gtotal;
        return $this;
    }
}