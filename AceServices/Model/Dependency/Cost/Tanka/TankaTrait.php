<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tanka;

use Plugin\AceClient\Util\Converter\NumberConverter;

/**
 * Trait for 単価
 * 
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
trait TankaTrait
{
    /** @var float $tanka 単価 */
    protected ?float $tanka = null;

    /**
     * {@inheritDoc}
     */
    public function getTanka(): ?float
    {
        return $this->tanka;
    }

    /**
     * {@inheritDoc}
     */
    public function setTanka(?string $tanka): static
    {
        $this->tanka = NumberConverter::stringWithCommaToFloat($tanka);
        return $this;
    }
}