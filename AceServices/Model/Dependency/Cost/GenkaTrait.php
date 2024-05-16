<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

/**
 * Trait for 原価
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait GenkaTrait
{
    /**
     * 原価
     * 
     * @var ?int
     */
    protected ?int $genka = null;

    /**
     * {@inheritDoc}
     */
    public function getGenka(): ?int
    {
        return $this->genka;
    }

    /**
     * {@inheritDoc}
     */
    public function setGenka(?int $genka): static
    {
        $this->genka = $genka;
        return $this;
    }
}