<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

/**
 * Trait for Utax
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait UtaxTrait
{
    /** @var ?string $utax 内消費税 */
    protected ?string $utax = null;

    /**
     * {@inheritDoc}
     */
    public function getUtax(): ?string
    {
        return $this->utax;
    }

    /**
     * {@inheritDoc}
     */
    public function setUtax(?string $utax)
    {
        $this->utax = $utax;
        return $this;
    }
}