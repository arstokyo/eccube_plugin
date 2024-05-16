<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tax;

/**
 * Trait for 内税対象額（税込）
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait UTTotalTrait
{
            
    /** @var ?int $uttotal 内税対象額（税込） */
    protected ?int $uttotal = null;

    /**
    * {@inheritDoc}
    */
    public function getUttotal(): ?int
    {
        return $this->uttotal;
    }

    /**
    * {@inheritDoc}
    */
    public function setUttotal(?int $uttotal): static
    {
        $this->uttotal = $uttotal;
        return $this;
    }
    
}