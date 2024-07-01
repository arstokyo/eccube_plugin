<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card;

/**
 * Trait for カード名義人
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait CnameTrait
{
    /**
     * カード名義人
     * 
     * @var string|null
     */
    protected ?string $cname = null;

    /**
     * {@inheritDoc}
     */
    public function getCname(): ?string
    {
        return $this->cname;
    }

    /**
     * {@inheritDoc}
     */
    public function setCname(?string $cname)
    {
        $this->cname = $cname;
        return $this;
    }

}