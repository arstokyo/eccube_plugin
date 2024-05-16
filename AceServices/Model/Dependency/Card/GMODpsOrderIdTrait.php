<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card;

/**
 * Trait for GMODps Order ID
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait GMODpsOrderIdTrait 
{

    /**
     * GMODps Order ID
     * 
     * @var string|null
     */
    protected ?string $gmodpsorderid = null;

    /**
     * {@inheritDoc}
     */
    public function getGmodpsorderid(): ?string
    {
        return $this->gmodpsorderid;
    }

    /**
     * {@inheritDoc}
     */
    public function setGmodpsorderid(string|null $gmodpsorderid): static
    {
        $this->gmodpsorderid = $gmodpsorderid;
        return $this;
    }

}