<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tesuu;

/**
 * Trait for 手数料合計
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TesuuZnTrait 
{
    /** @var ?int $tesuuzn 手数料合計 */
    protected ?int $tesuuzn = null;

    /**
     * {@inheritDoc}
     */
    public function getTesuuzn(): ?int
    {
        return $this->tesuuzn;
    }

    /**
     * {@inheritDoc}
     */
    public function setTesuuzn(?int $tesuuzn): static
    {
        $this->tesuuzn = $tesuuzn;
        return $this;
    }
}