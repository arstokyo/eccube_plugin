<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Zaiko;

/**
 * Trait for 在庫数
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ZaikoTrait 
{

    /** @var ?int $zaiko 在庫数 */
    protected ?int $zaiko = null;

    /**
     * {@inheritDoc}
     */
    public function getZaiko(): ?int
    {
        return $this->zaiko;
    }

    /**
     * {@inheritDoc}
     */
    public function setZaiko(?int $zaiko)
    {
        $this->zaiko = $zaiko;
        return $this;
    }

}