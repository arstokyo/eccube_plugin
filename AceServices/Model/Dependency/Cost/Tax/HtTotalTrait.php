<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

/**
 * Trait for 非課税対象額
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait HtTotalTrait
{
                
    /** @var ?int $httotal 非課税対象額 */
    protected ?int $httotal = null;

    /**
    * {@inheritDoc}
    */
    public function getHttotal(): ?int
    {
        return $this->httotal;
    }

    /**
    * {@inheritDoc}
    */
    public function setHttotal(?int $httotal): static
    {
        $this->httotal = $httotal;
        return $this;
    }

}