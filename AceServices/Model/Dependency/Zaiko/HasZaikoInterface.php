<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Zaiko;

/**
 * Interface for 在庫数
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasZaikoInterface
{
 
    /**
     * Get 在庫数
     * 
     * @return int|null
     */
    public function getZaiko(): ?int;

    /**
     * Set 在庫数
     * 
     * @param int|null $zaiko
     * @return $this
     */
    public function setZaiko(?int $zaiko): static;

}