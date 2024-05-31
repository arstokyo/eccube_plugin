<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card;

use Plugin\AceClient\AceServices\Model\Dependency\Card\GMO\GMOStatusTrait;

/**
 * Trait for Card Level 3
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait CardModelLevel3Trait
{
    use GMOStatusTrait;

    /** @var ?int $spsstatus SPS status */
    protected ?int $spsstatus = null;

    /** @var ?string $pgtkid ペイジェント決済ID */
    protected ?string $pgtkid = null;

    /** @var ?int $pgtstatus ペイジェント決済ステータス */
    protected ?int $pgtstatus = null;

    /**
     * {@inheritDoc}
     */ 
    public function getSpsstatus(): ?int
    {
        return $this->spsstatus;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setSpsstatus(?int $spsstatus): static
    {
        $this->spsstatus = $spsstatus;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPgtkid(): ?string
    {
        return $this->pgtkid;
    }

    /**
     * {@inheritDoc}
     */
    public function setPgtkid(?string $pgtkid): static
    {
        $this->pgtkid = $pgtkid;
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getPgtstatus(): ?int
    {
        return $this->pgtstatus;
    }

    /**
     * {@inheritDoc}
     */
    public function setPgtstatus(?int $pgtstatus): static
    {
        $this->pgtstatus = $pgtstatus;
        return $this;
    }

}