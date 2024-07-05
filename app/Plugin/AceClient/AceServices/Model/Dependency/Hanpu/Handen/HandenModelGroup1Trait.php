<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Handen;


/**
 * Trait for HandenModelGroup1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait HandenModelGroup1Trait
{
    /** @var ?int $site サイト */
    protected ?int $site = null;

    /** @var ?int $sdd ２回目以降出荷固定日 */
    protected ?int $sdd = null;

    /** @var ?int $weeksite 週指定 */
    protected ?int $weeksite = null;

    /** @var ?int $weekday 曜日指定 */
    protected ?int $weekday = null;

    /** @var ?int $otodokedd 2回目以降お届け日 */
    protected ?int $otodokedd = null;

    /** @var ?int $otodokewsite 週指定 */
    protected ?int $otodokewsite = null;

    /** @var ?int $otodokewday 曜日指定 */
    protected ?int $otodokewday = null;

    /**
     * {@inheritDoc}
     */
    public function getSite(): ?int
    {
        return $this->site;
    }

    /**
     * {@inheritDoc}
     */
    public function setSite(?int $site): static
    {
        $this->site = $site;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSdd(): ?int
    {
        return $this->sdd;
    }

    /**
     * {@inheritDoc}
     */
    public function setSdd(?int $sdd): static
    {
        $this->sdd = $sdd;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getWeeksite(): ?int
    {
        return $this->weeksite;
    }

    /**
     * {@inheritDoc}
     */
    public function setWeeksite(?int $weeksite): static
    {
        $this->weeksite = $weeksite;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getWeekday(): ?int
    {
        return $this->weekday;
    }

    /**
     * {@inheritDoc}
     */
    public function setWeekday(?int $weekday): static
    {
        $this->weekday = $weekday;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getOtodokedd(): ?int
    {
        return $this->otodokedd;
    }

    /**
     * {@inheritDoc}
     */
    public function setOtodokedd(?int $otodokedd): static
    {
        $this->otodokedd = $otodokedd;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getOtodokewsite(): ?int
    {
        return $this->otodokewsite;
    }

    /**
     * {@inheritDoc}
     */
    public function setOtodokewsite(?int $otodokewsite): static
    {
        $this->otodokewsite = $otodokewsite;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getOtodokewday(): ?int
    {
        return $this->otodokewday;
    }

    /**
     * {@inheritDoc}
     */
    public function setOtodokewday(?int $otodokewday): static
    {
        $this->otodokewday = $otodokewday;
        return $this;
    }

}