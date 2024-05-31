<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card\GMO;

/**
 * Trait for GMO取引ID
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait GMODpsTIdTrait
{
    /**
     * GMO取引ID
     * 
     * @var string|null
     */
    protected ?string $gmodpstid = null;

    /**
     * {@inheritDoc}
     */
    public function getGmodpstid(): ?string
    {
        return $this->gmodpstid;
    }

    /**
     * {@inheritDoc}
     */
    public function setGmodpstid(string|null $gmodpstid): static
    {
        $this->gmodpstid = $gmodpstid;
        return $this;
    }
}