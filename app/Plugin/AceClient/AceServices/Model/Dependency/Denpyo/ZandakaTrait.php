<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

use Plugin\AceClient\Util\Converter\NumberConverter;

/**
 * Trait for 伝票残高
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ZandakaTrait
{
    /** @var ?float $zandaka 伝票残高 */
    protected ?float $zandaka = null;

    /**
     * {@inheritDoc}
     */
    public function getZandaka(): ?float
    {
        return $this->zandaka;
    }

    /**
     * {@inheritDoc}
     */
    public function setZandaka(string|null $zandaka): static
    {
        $this->zandaka = NumberConverter::stringWithCommaToFloat($zandaka);
        return $this;
    }
}