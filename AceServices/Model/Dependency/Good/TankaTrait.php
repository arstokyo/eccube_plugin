<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Trait for 単価
 * 
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
trait TankaTrait 
{
    /** @var int $tanka 単価 */
    protected ?int $tanka = null;

    /**
     * {@inheritDoc}
     */
    public function getTanka(): ?int
    {
        return $this->tanka;
    }

    /**
     * {@inheritDoc}
     */
    public function setTanka(?int $tanka)
    {
        $this->tanka = $tanka;
        return $this;
    }
}