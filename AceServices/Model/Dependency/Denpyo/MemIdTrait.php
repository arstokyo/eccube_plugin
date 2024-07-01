<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for 顧客用ID
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait MemIdTrait
{   
    /** @var ?int $memid 顧客用ID */
    protected ?int $memid = null;

    /**
     * {@inheritDoc}
     */
    public function getMemid(): ?int
    {
        return $this->memid;
    }

    /**
     * {@inheritDoc}
     */
    public function setMemid(int|null $memid): static
    {
        $this->memid = $memid;
        return $this;
    }

}