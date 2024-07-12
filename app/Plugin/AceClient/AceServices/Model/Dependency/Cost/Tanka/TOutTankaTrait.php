<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tanka;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for Has 税抜き単価
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TOutTankaTrait
{

    /** @var ?float $touttanka 税抜き単価 */
    protected ?float $touttanka = null;

    /**
     * {@inheritDoc}
     */
    public function getTouttanka(): ?float
    {
        return $this->touttanka;
    }

    /**
     * {@inheritDoc}
     */
    public function setTouttanka(?string $touttanka)
    {
        $this->touttanka = NumberConverter::stringWithCommaToFloat($touttanka);
        return $this;
    }

}