<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

/**
 * Trait for Stax
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait StaxTrait
{
    /** @var ?int $stax 消費税額(外税) */
    protected ?int $stax = null;

    /**
     * {@inheritDoc}
     */
    public function getStax(): ?int
    {
        return $this->stax;
    }

    /**
     * {@inheritDoc}
     */
    public function setStax(?int $stax)
    {
        $this->stax = $stax;
        return $this;
    }
}