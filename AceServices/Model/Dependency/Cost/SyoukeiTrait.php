<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

use Plugin\AceClient\Util\Converter\NumberConverter;

/**
 * Trait for 小計
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait SyoukeiTrait
{

    /** @var ?float $syoukei 小計 */
    protected ?float $syoukei = null;

    /**
     * {@inheritDoc}
     */
    public function getSyoukei(): ?float
    {
        return $this->syoukei;
    }

    /**
     * {@inheritDoc}
     */
    public function setSyoukei(?string $syoukei)
    {
        $this->syoukei = NumberConverter::stringWithCommaToFloat($syoukei);
        return $this;
    }
}