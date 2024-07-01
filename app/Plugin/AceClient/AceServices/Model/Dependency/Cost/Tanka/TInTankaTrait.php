<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tanka;

use Plugin\AceClient\Util\Converter\NumberConverter;

/**
 * Trait for 税込み単価
 *  
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TInTankaTrait
{
    /** @var ?float $tintanka 税込み単価 */
    protected ?float $tintanka = null;

    /**
     * {@inheritDoc}
     */
    public function getTintanka(): ?float
    {
        return $this->tintanka;
    }

    /**
     * {@inheritDoc}
     */
    public function setTintanka(?string $tintanka)
    {
        $this->tintanka = NumberConverter::stringWithCommaToFloat($tintanka);
        return $this;
    }
}