<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\OkuriAndNouhin;

/**
 * Trait for 送り主
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait OkuriNusiTrait 
{
    /** @var ?string $okurinusi 送り主 */
    protected ?string $okurinusi = null;

    /**
     * {@inheritDoc}
     */
    public function getOkurinusi(): ?string
    {
        return $this->okurinusi;
    }

    /**
     * {@inheritDoc}
     */
    public function setOkurinusi(?string $okurinusi)
    {
        $this->okurinusi = $okurinusi;
        return $this;
    }
}