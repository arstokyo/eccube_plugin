<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

/**
 * Trait for Utax
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait UtaxTrait
{
    /** @var ?int $utax 内消費税 */
    protected ?int $utax = null;

    /**
     * {@inheritDoc}
     */
    public function getUtax(): ?int
    {
        return $this->utax;
    }

    /**
     * {@inheritDoc}
     */
    public function setUtax(?int $utax)
    {
        $this->utax = $utax;
        return $this;
    }
}