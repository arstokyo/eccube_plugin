<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Trait for 商品区分
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait GkbnTrait 
{

    /** @var ?int $gkbn 商品区分 */
    protected ?int $gkbn = null;

    /**
     * {@inheritDoc}
     */
    public function getGkbn(): ?int
    {
        return $this->gkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setGkbn(?int $gkbn): static
    {
        $this->gkbn = $gkbn;
        return $this;
    }

}