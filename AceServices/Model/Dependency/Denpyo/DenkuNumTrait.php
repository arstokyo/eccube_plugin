<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for 伝票フラグ
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait DenkuNumTrait
{
    /** @var ?int $denkuNum 伝票フラグ */
    protected ?int $denkuNum = null;

    /**
     * {@inheritDoc}
     */
    public function getDenkuNum(): ?int
    {
        return $this->denkuNum;
    }

    /**
     * {@inheritDoc}
     */
    public function setDenkuNum(?int $denkuNum): static
    {
        $this->denkuNum = $denkuNum;
        return $this;
    }
}