<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Zaiko;

/**
 * Trait for 在庫状況無視 フラグ
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */ 
trait IgnoreZaikoTrait
{

    /** @var ?int $ignorezaiko 在庫状況無視 フラグ */
    protected ?int $ignorezaiko = null;

    /**
     * {@inheritDoc}
     */
    public function getIgnorezaiko(): ?int
    {
        return $this->ignorezaiko;
    }

    /**
     * {@inheritDoc}
     */
    public function setIgnorezaiko(?int $ignorezaiko)
    {
        $this->ignorezaiko = $ignorezaiko;
        return $this;
    }

}