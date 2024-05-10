<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Address;

/**
 * Trait For 4つ Cdv住所
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait FourCdvAdrTrait 
{
    /** @var ?string $cnvadr1 住所1 */
    protected ?string $cnvadr1 = null;

    /** @var ?string $cnvadr2 住所2 */
    protected ?string $cnvadr2 = null;

    /** @var ?string $cnvadr3 住所3 */
    protected ?string $cnvadr3 = null;

    /** @var ?string $cnvadr4 住所4 */
    protected ?string $cnvadr4 = null;

    /**
     * {@inheritDoc}
     */
    public function getCnvAdr1(): string
    {
        return $this->cnvadr1;
    }

    /**
     * {@inheritDoc}
     */
    public function setCnvAdr1(?string $cnvadr1)
    {
        $this->cnvadr1 = $cnvadr1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCnvAdr2(): string
    {
        return $this->cnvadr2;
    }

    /**
     * {@inheritDoc}
     */
    public function setCnvAdr2(?string $cnvadr2)
    {
        $this->cnvadr2 = $cnvadr2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCnvAdr3(): string
    {
        return $this->cnvadr3;
    }

    /**
     * {@inheritDoc}
     */
    public function setCnvAdr3(?string $cnvadr3)
    {
        $this->cnvadr3 = $cnvadr3;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCnvAdr4(): string
    {
        return $this->cnvadr4;
    }

    /**
     * {@inheritDoc}
     */
    public function setCnvAdr4(?string $cnvadr4)
    {
        $this->cnvadr4 = $cnvadr4;
        return $this;
    }
}