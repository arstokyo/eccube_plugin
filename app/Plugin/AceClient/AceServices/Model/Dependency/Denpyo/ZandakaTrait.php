<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

use Plugin\AceClient43\Util\Converter\NumberConverter;

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
    public function setZandaka(?string $zandaka)
    {
        $this->zandaka = NumberConverter::stringWithCommaToFloat($zandaka);
        return $this;
    }
}