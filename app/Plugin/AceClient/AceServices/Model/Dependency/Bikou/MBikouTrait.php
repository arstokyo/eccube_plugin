<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Bikou;

/**
 * Trait for 明細備考
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait MBikouTrait 
{

    /** @var ?string $mbikou 明細備考 */
    protected ?string $mbikou = null;

    /**
     * {@inheritDoc}
     */
    public function getMbikou(): ?string
    {
        return $this->mbikou;
    }

    /**
     * {@inheritDoc}
     */
    public function setMbikou(?string $mbikou): static
    {
        $this->mbikou = $mbikou;
        return $this;
    }

}
