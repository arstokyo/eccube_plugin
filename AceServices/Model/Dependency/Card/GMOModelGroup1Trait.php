<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card;

/**
 * Trait for GMO Group 1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait GMOModelGroup1Trait
{
     
    /** @var ?string $gmomemberid GMO会員ID */
    protected ?string $gmomemberid = null;

    /** @var ?string $gmoorderid GMOオーダーID */
    protected ?string $gmoorderid = null;

    /** @var ?string $gmotorihikiid GMO取引ID */
    protected ?string $gmotorihikiid = null;

    /** @var ?string $gmotorihikipw GMO取引パスワード */
    protected ?string $gmotorihikipw = null;

     /**
     * {@inheritDoc}
     */
    public function getGmomemberid(): ?string
    {
        return $this->gmomemberid;
    }

    /**
     * {@inheritDoc}
     */
    public function setGmomemberid(string|null $gmomemberid): static
    {
        $this->gmomemberid = $gmomemberid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getGmoorderid(): ?string
    {
        return $this->gmoorderid;
    }

    /**
     * {@inheritDoc}
     */
    public function setGmoorderid(string|null $gmoorderid): static
    {
        $this->gmoorderid = $gmoorderid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getGmotorihikiid(): ?string
    {
        return $this->gmotorihikiid;
    }

    /**
     * {@inheritDoc}
     */
    public function setGmotorihikiid(string|null $gmotorihikiid): static
    {
        $this->gmotorihikiid = $gmotorihikiid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getGmotorihikipw(): ?string
    {
        return $this->gmotorihikipw;
    }

    /**
     * {@inheritDoc}
     */
    public function setGmotorihikipw(string|null $gmotorihikipw): static
    {
        $this->gmotorihikipw = $gmotorihikipw;
        return $this;
    }

}