<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Bumon;

/**
 * Trait for 部門
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait BumonTrait 
{

    /** @var ?string $bumon 部門 */
    protected ?string $bumon = null;

    /**
     * {@inheritDoc}
     */
    public function getBumon(): ?string
    {
        return $this->bumon;
    }

    /**
     * {@inheritDoc}
     */
    public function setBumon(?string $bumon)
    {
        $this->bumon = $bumon;
        return $this;
    }

}