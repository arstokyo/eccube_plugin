<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Bikou;

/**
 * Trait for Two 納品書備考
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TwoNBikouTrait 
{

    /** @var ?string $nbikou1 納品書備考1 */
    protected ?string $nbikou1 = null;

    /** @var ?string $nbikou2 納品書備考2 */
    protected ?string $nbikou2 = null;

    /**
     * {@inheritDoc}
     */
    public function getNbikou1(): ?string
    {
        return $this->nbikou1;
    }

    /**
     * {@inheritDoc}
     */
    public function setNbikou1(?string $nbikou1): static
    {
        $this->nbikou1 = $nbikou1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNbikou2(): ?string
    {
        return $this->nbikou2;
    }

    /**
     * {@inheritDoc}
     */
    public function setNbikou2(?string $nbikou2): static
    {
        $this->nbikou2 = $nbikou2;
        return $this;
    }

}