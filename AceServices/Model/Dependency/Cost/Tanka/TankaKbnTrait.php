<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tanka;

/**
 * Trait for 単価区分
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TankaKbnTrait 
{

    /** @var ?int $tankaKbn 単価区分 */
    protected ?int $tankaKbn = null;

    /**
     * {@inheritDoc}
     */
    public function getTankaKbn(): ?int
    {
        return $this->tankaKbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setTankaKbn(?int $tankaKbn): static
    {
        $this->tankaKbn = $tankaKbn;
        return $this;
    }

}