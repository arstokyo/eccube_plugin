<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Address;

/**
 * Trait for Adr
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait AdrTrait
{
    /** @var ?string $adr 住所 */
    protected ?string $adr = null;

    /**
     * {@inheritDoc}
     */
    public function getAdr(): ?string
    {
        return $this->adr;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdr(?string $adr): static
    {
        $this->adr = $adr;
        return $this;
    }
}