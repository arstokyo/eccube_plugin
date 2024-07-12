<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Card;

use Plugin\AceClient43\AceServices\Model\Dependency\Card\GMO\GMOModelGroup1Trait;

/**
 * Model for Card Level 2
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait CardModelLevel2Trait 
{
    use CardModelLevel1Trait,
        GMOModelGroup1Trait;

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
    public function setSpscustomerid(?string $spscustomerid)
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
    public function setSpstid(?string $spstid)
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
    public function setVeristatus(?string $veristatus)
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
    public function setVeriorderid(?string $veriorderid)
    {
        $this->veriorderid = $veriorderid;
        return $this;
    }

}