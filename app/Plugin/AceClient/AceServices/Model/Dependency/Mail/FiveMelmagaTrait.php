<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail;

/**
 * Trait for 5つメルマガ区分
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait FiveMelmagaTrait
{
    /** @var ?int $melmaga1 メルマガ区分1 */
    protected ?int $melmaga1 = null;
    /** @var ?int $melmaga2 メルマガ区分2 */
    protected ?int $melmaga2 = null;
    /** @var ?int $melmaga3 メルマガ区分3 */
    protected ?int $melmaga3 = null;
    /** @var ?int $melmaga4 メルマガ区分4 */
    protected ?int $melmaga4 = null;
    /** @var ?int $melmaga5 メルマガ区分5 */
    protected ?int $melmaga5 = null;

    /**
     * {@inheritDoc}
     */
    public function getMelmaga1(): ?int
    {
        return $this->melmaga1;
    }

    /**
     * {@inheritDoc}
     */
    public function setMelmaga1(?int $melmaga1): static
    {
        $this->melmaga1 = $melmaga1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMelmaga2(): ?int
    {
        return $this->melmaga2;
    }

    /**
     * {@inheritDoc}
     */
    public function setMelmaga2(?int $melmaga2): static
    {
        $this->melmaga2 = $melmaga2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMelmaga3(): ?int
    {
        return $this->melmaga3;
    }

    /**
     * {@inheritDoc}
     */
    public function setMelmaga3(?int $melmaga3): static
    {
        $this->melmaga3 = $melmaga3;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMelmaga4(): ?int
    {
        return $this->melmaga4;
    }

    /**
     * {@inheritDoc}
     */
    public function setMelmaga4(?int $melmaga4): static
    {
        $this->melmaga4 = $melmaga4;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMelmaga5(): ?int
    {
        return $this->melmaga5;
    }

    /**
     * {@inheritDoc}
     */
    public function setMelmaga5(?int $melmaga5): static
    {
        $this->melmaga5 = $melmaga5;
        return $this;
    }
}