<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\NeBiki;

/**
 * Trait for 値引合計
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait NeBikiZnTrait 
{
    /** @var ?int $nebikizn 値引合計 */
    protected ?int $nebikizn = null;

    /**
     * {@inheritDoc}
     */
    public function getNebikizn(): ?int
    {
        return $this->nebikizn;
    }

    /**
     * {@inheritDoc}
     */
    public function setNebikizn(?int $nebikizn): static
    {
        $this->nebikizn = $nebikizn;
        return $this;
    }
}