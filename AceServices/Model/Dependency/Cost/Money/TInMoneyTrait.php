<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Money;

use Plugin\AceClient\Utils\Converter\NumberConverter;

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
    public function setTinmoney(?string $tinmoney): static
    {
        $this->tinmoney = NumberConverter::stringWithCommaToFloat($tinmoney);
        return $this;
    }

}
