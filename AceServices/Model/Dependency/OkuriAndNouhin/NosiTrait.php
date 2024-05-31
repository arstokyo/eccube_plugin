<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\OkuriAndNouhin;

/**
 * Trait for のし
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait NosiTrait 
{
    /** @var ?string $nosi のし */
    protected ?string $nosi = null;

    /**
     * {@inheritDoc}
     */
    public function getNosi(): ?string
    {
        return $this->nosi;
    }

    /**
     * {@inheritDoc}
     */
    public function setNosi(?string $nosi): static
    {
        $this->nosi = $nosi;
        return $this;
    }
}