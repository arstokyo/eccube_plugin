<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Money;

use Plugin\AceClient43\Util\Converter\NumberConverter;

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
    public function setToutmoney(?string $toutmoney)
    {
        $this->toutmoney = NumberConverter::stringWithCommaToFloat($toutmoney);
        return $this;
    }

}