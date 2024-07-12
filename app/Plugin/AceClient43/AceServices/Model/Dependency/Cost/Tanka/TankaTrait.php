<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tanka;

use Plugin\AceClient43\Util\Converter\NumberConverter;

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
    public function setTanka(?string $tanka)
    {
        $this->tanka = NumberConverter::stringWithCommaToFloat($tanka);
        return $this;
    }
}