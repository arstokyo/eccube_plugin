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
    protected string|int|null $denku = null;

    /**
     * {@inheritDoc}
     */
    public function getDenku(): string|int|null
    {
        return $this->denku;
    }

    /**
     * {@inheritDoc}
     */
    public function setDenku(string|int|null $denku)
    {
        $this->denku = $denku;
        return $this;
    }
}