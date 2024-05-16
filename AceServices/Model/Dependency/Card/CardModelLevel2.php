<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card;

/**
 * Model for Card Level 2
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class CardModelLevel2 extends CardModelLevel1 implements CardModelLevel2Interface
{
    use GMOModelGroup1Trait;

    /** @var ?string $spscustomerid SPS会員ID */
    protected ?string $spscustomerid = null;

    /** @var ?string $spstid SPSトランザクションID */
    protected ?string $spstid = null;

    /** @var ?string $veristatus VeriTransステータス */
    protected ?string $veristatus = null;

    /** @var ?string $veriorderid VeriTrans取引ID */
    protected ?string $veriorderid = null;

        
    /**
     * {@inheritDoc}
     */
    public function getSpscustomerid(): ?string
    {
        return $this->spscustomerid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSpscustomerid(string|null $spscustomerid): static
    {
        $this->spscustomerid = $spscustomerid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpstid(): ?string
    {
        return $this->spstid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSpstid(string|null $spstid): static
    {
        $this->spstid = $spstid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getVeristatus(): ?string
    {
        return $this->veristatus;
    }

    /**
     * {@inheritDoc}
     */
    public function setVeristatus(string|null $veristatus): static
    {
        $this->veristatus = $veristatus;
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getVeriorderid(): ?string
    {
        return $this->veriorderid;
    }

    /**
     * {@inheritDoc}
     */
    public function setVeriorderid(string|null $veriorderid): static
    {
        $this->veriorderid = $veriorderid;
        return $this;
    }

}