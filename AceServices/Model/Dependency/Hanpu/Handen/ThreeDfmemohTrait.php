<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Handen;

/**
 * Trait ThreeDfmemoh
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ThreeDfmemohTrait
{
    /** @var ?string $dfmemoh1 伝票フリーメモ1 */
    protected ?string $dfmemoh1 = null;

    /** @var ?string $dfmemoh2 伝票フリーメモ2 */
    protected ?string $dfmemoh2 = null;

    /** @var ?string $dfmemoh3 伝票フリーメモ3 */
    protected ?string $dfmemoh3 = null;

    /**
     * {@inheritDoc}
     */
    public function getDfmemoh1(): ?string
    {
        return $this->dfmemoh1;
    }

    /**
     * {@inheritDoc}
     */
    public function setDfmemoh1(?string $dfmemoh1): static
    {
        $this->dfmemoh1 = $dfmemoh1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDfmemoh2(): ?string
    {
        return $this->dfmemoh2;
    }

    /**
     * {@inheritDoc}
     */
    public function setDfmemoh2(?string $dfmemoh2): static
    {
        $this->dfmemoh2 = $dfmemoh2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDfmemoh3(): ?string
    {
        return $this->dfmemoh3;
    }

    /**
     * {@inheritDoc}
     */
    public function setDfmemoh3(?string $dfmemoh3): static
    {
        $this->dfmemoh3 = $dfmemoh3;
        return $this;
    }
}