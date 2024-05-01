<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Bikou;

trait ThreeAdrBikouTrait 
{
    /** @var string|null $bikou1 住所備考1 */
    protected ?string $bikou1 = null;

    /** @var ?string $bikou2 住所備考2 */
    protected ?string $bikou2 = null;

    /** @var ?string $bikou3 住所備考3 */
    protected ?string $bikou3 = null;

    /**
     * {@inheritDoc}
     */
    public function getBikou1(): ?string
    {
        return $this->bikou1;
    }

    /**
     * {@inheritDoc}
     */
    public function setBikou1(?string $bikou1): parent
    {
        $this->bikou1 = $bikou1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBikou2(): ?string
    {
        return $this->bikou2;
    }

    /**
     * {@inheritDoc}
     */
    public function setBikou2(?string $bikou2): parent
    {
        $this->bikou2 = $bikou2;
        return $this;
    }


    /**
     * {@inheritDoc}
     */
    public function getBikou3(): ?string
    {
        return $this->bikou3;
    }

    /**
     * {@inheritDoc}
     */
    public function setBikou3(?string $bikou3): parent
    {
        $this->bikou3 = $bikou3;
        return $this;
    }

}