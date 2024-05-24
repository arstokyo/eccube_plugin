<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Money;

use Plugin\AceClient\Utils\Converter\NumberConverter;

/**
 * Trait for 税抜き金額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TOutMoneyTrait 
{

    /** @var ?float $toutmoney 税抜き金額 */
    protected ?float $toutmoney = null;

    /**
     * {@inheritDoc}
     */
    public function getToutmoney(): ?float
    {
        return $this->toutmoney;
    }

    /**
     * {@inheritDoc}
     */
    public function setToutmoney(?string $toutmoney): static
    {
        $this->toutmoney = NumberConverter::stringWithCommaToFloat($toutmoney);
        return $this;
    }

}