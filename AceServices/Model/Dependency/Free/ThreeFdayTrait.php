<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Trait for 3つフリー日付
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ThreeFdayTrait 
{
    /** @var int|null $fday1 フリー日付１ */
    protected ?int $fday1 = null;

    /** @var int|null $fday2 フリー日付２ */
    protected ?int $fday2 = null;

    /** @var int|null $fday3 フリー日付３ */
    protected ?int $fday3 = null;

    /**
     * {@inheritDoc}
     */
    public function getFday1(): ?int
    {
        return $this->fday1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFday1(?int $fday1)
    {
        $this->fday1 = $fday1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFday2(): ?int
    {
        return $this->fday2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFday2(?int $fday2)
    {
        $this->fday2 = $fday2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFday3(): ?int
    {
        return $this->fday3;
    }

    /**
     * {@inheritDoc}
     */
    public function setFday3(?int $fday3)
    {
        $this->fday3 = $fday3;
        return $this;
    }

}