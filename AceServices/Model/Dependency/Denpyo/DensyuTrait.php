<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for 伝票種別
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait DensyuTrait
{
    /** @var ?int $densyu 伝票種別 */
    protected ?int $densyu = null;

    /**
     * {@inheritDoc}
     */
    public function getDensyu(): ?int
    {
        return $this->densyu;
    }

    /**
     * {@inheritDoc}
     */
    public function setDensyu(?int $densyu)
    {
        $this->densyu = $densyu;
        return $this;
    }
}