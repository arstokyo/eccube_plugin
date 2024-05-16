<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

/**
 * Trait for 金額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait MoneyTrait
{

    /** @var ?int $money 金額 */
    protected ?int $money = null;

    /**
     * {@inheritDoc}
     */
    public function getMoney(): ?int
    {
        return $this->money;
    }

    /**
     * {@inheritDoc}
     */
    public function setMoney(?int $money): static
    {
        $this->money = $money;
        return $this;
    }

}