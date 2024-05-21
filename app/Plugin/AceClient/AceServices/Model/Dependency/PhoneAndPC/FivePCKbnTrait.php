<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Trait for 5つPC区分
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait FivePCKbnTrait
{
    /** @var ?int $pckbn1 PC区分1 */
    protected ?int $pckbn1 = null;

    /** @var ?int $pckbn2 PC区分2 */
    protected ?int $pckbn2 = null;

    /** @var ?int $pckbn3 PC区分3 */
    protected ?int $pckbn3 = null;

    /** @var ?int $pckbn4 PC区分4 */
    protected ?int $pckbn4 = null;

    /** @var ?int $pckbn5 PC区分5 */
    protected ?int $pckbn5 = null;

    /**
     * {@inheritDoc}
     */
    public function getPckbn1(): ?int
    {
        return $this->pckbn1;
    }

    /**
     * {@inheritDoc}
     */
    public function setPckbn1(?int $pckbn1): static
    {
        $this->pckbn1 = $pckbn1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPckbn2(): ?int
    {
        return $this->pckbn2;
    }

    /**
     * {@inheritDoc}
     */
    public function setPckbn2(?int $pckbn2): static
    {
        $this->pckbn2 = $pckbn2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPckbn3(): ?int
    {
        return $this->pckbn3;
    }

    /**
     * {@inheritDoc}
     */
    public function setPckbn3(?int $pckbn3): static
    {
        $this->pckbn3 = $pckbn3;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPckbn4(): ?int
    {
        return $this->pckbn4;
    }

    /**
     * {@inheritDoc}
     */
    public function setPckbn4(?int $pckbn4): static
    {
        $this->pckbn4 = $pckbn4;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPckbn5(): ?int
    {
        return $this->pckbn5;
    }

    /**
     * {@inheritDoc}
     */
    public function setPckbn5(?int $pckbn5): static
    {
        $this->pckbn5 = $pckbn5;
        return $this;
    }

}