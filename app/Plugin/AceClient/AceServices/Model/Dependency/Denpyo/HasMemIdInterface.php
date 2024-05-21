<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Has 顧客用ID
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasMemIdInterface
{

    /**
     * Get 顧客用ID
     * 
     * @return ?int
     */
    public function getMemid(): ?int;

    /**
     * Set 顧客用ID
     * 
     * @param int|null $memid
     * @return $this
     */
    public function setMemid(int|null $memid): static;

}