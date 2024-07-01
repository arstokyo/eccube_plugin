<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for 伝票種類
 *
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
trait DenkuTrait
{
    /** @var ?string $denku 伝票種類 */
    protected ?string $denku = null;

    /**
     * {@inheritDoc}
     */
    public function getDenku(): ?string
    {
        return $this->denku;
    }

    /**
     * {@inheritDoc}
     */
    public function setDenku(?string $denku)
    {
        $this->denku = $denku;
        return $this;
    }
}