<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Okuri;

/**
 * Trait for Okuri
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait OkurinoTrait
{
    /** @var ?string $okurino 送り状番号 */
    protected ?string $okurino = null;

    /**
     * {@inheritDoc}
     */
    public function getOkurino(): ?string
    {
        return $this->okurino;
    }

    /**
     * {@inheritDoc}
     */
    public function setOkurino(?string $okurino)
    {
        $this->okurino = $okurino;
        return $this;
    }
}