<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Money;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for 税込み金額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TInMoneyTrait
{

    /** @var ?float $tinmoney 税込み金額 */
    protected ?float $tinmoney = null;

    /**
     * {@inheritDoc}
     */
    public function getTinmoney(): ?float
    {
        return $this->tinmoney;
    }

    /**
     * {@inheritDoc}
     */
    public function setTinmoney(?string $tinmoney)
    {
        $this->tinmoney = NumberConverter::stringWithCommaToFloat($tinmoney);
        return $this;
    }

}
