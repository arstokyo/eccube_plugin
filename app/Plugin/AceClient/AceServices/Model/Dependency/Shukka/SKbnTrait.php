<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Shukka;

/**
 * Trait for 出荷対象区分
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait SKbnTrait 
{
    
    /** @var ?int $skbn 出荷対象区分 */
    protected ?int $skbn = null;

    /**
     * {@inheritDoc}
     */
    public function getSkbn(): ?int
    {
        return $this->skbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setSkbn(?int $skbn)
    {
        $this->skbn = $skbn;
        return $this;
    }

}