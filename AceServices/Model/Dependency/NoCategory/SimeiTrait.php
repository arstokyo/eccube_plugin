<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for 氏名
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait SimeiTrait 
{
    /** @var ?string $simei 氏名*/
    protected ?string $simei = null;

    /**
     * {@inheritDoc}
     */
    public function getSimei(): ?string
    {
        return $this->simei;
    }

    /**
     * {@inheritDoc}
     */
    public function setSimei(?string $simei): static
    {
        $this->simei = $simei;
        return $this;
    }
}