<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for 伝票種類
 * 
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
trait DenkuTrait 
{
    /** @var int $denku 伝票種類 */
    protected ?int $denku = null;

    /**
     * {@inheritDoc}
     */
    public function getDenku(): ?int
    {
        return $this->denku;
    }

    /**
     * {@inheritDoc}
     */
    public function setDenku(?int $denku)
    {
        $this->denku = $denku;
        return $this;
    }
}