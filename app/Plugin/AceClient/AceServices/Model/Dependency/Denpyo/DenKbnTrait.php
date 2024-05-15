<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for 伝票区分
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait DenKbnTrait
{
    /** @var ?string $denkbn 伝票区分 */
    protected ?string $denkbn = null;

       /**
     * {@inheritDoc}
     */
    public function getDenkbn(): ?string
    {
        return $this->denkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setDenkbn(?string $denkbn): static
    {
        $this->denkbn = $denkbn;
        return $this;
    }
}