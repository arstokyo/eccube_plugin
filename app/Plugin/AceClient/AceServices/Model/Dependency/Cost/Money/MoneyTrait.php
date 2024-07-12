<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Money;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for 金額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait MoneyTrait
{

    /** @var ?float $money 金額 */
    protected ?float $money = null;

    /**
     * {@inheritDoc}
     */
    public function getMoney(): ?float
    {
        return $this->money;
    }

    /**
     * {@inheritDoc}
     */
    public function setMoney(?string $money)
    {
        $this->money = NumberConverter::stringWithCommaToFloat($money);
        return $this;
    }

}