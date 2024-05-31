<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail\MemMail;

/**
 * Trait for Has MemMailModel
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait MemMailTrait
{
    /** @var ?MemMailModel $memmail メール */
    protected ?MemMailModel $memmail = null;

    /**
     * {@inheritDoc}
     */
    public function getMemmail(): ?MemMailModel
    {
        return $this->memmail;
    }

    /**
     * {@inheritDoc}
     */
    public function setMemmail(?MemMailModel $memmail): static
    {
        $this->memmail = $memmail;
        return $this;
    }

}