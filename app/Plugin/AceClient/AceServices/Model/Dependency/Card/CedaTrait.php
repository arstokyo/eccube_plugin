<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Card;

/**
 * Trait for カード枝番
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait CedaTrait 
{
    /**
     * カード枝番
     * 
     * @var string|null
     */
    protected ?string $ceda = null;

    /**
     * {@inheritDoc}
     */
    public function getCeda(): ?string
    {
        return $this->ceda;
    }

    /**
     * {@inheritDoc}
     */
    public function setCeda(?string $ceda)
    {
        $this->ceda = $ceda;
        return $this;
    }

}