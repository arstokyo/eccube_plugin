<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for PassWd
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PassWdTrait
{
    /** @var string $passWd パスワード */
    protected ?string $passWd = null;

    /**
     * {@inheritDoc}
     */
    public function getPassWd(): ?string
    {
        return $this->passWd;
    }

    /**
     * {@inheritDoc}
     */
    public function setPassWd(?string $passWd)
    {
        $this->passWd = $passWd;
        return $this;
    }
}