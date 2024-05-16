<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

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
    public function setMoney(?float $money): static
    {
        $this->money = $money;
        return $this;
    }

}