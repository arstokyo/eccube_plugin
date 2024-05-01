<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Trait For 3つフリー
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ThreeFreeTrait 
{
    /** @var string|null $free1 フリー1 */
    protected ?string $free1 = null;

    /** @var string|null $free2 フリー2 */
    protected ?string $free2 = null;

    /** @var string|null $free3 フリー3 */
    protected ?string $free3 = null;

    /**
     * {@inheritDoc}
     */
    public function getFree1(): ?string
    {
        return $this->free1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFree1(?string $free1): parent
    {
        $this->free1 = $free1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFree2(): ?string
    {
        return $this->free2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFree2(?string $free2): parent
    {
        $this->free2 = $free2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFree3(): ?string
    {
        return $this->free3;
    }

    /**
     * {@inheritDoc}
     */
    public function setFree3(?string $free3): parent
    {
        $this->free3 = $free3;
        return $this;
    }

}