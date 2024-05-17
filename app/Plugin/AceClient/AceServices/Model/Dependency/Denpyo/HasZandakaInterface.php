<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Has 伝票残高
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>   
*/
interface HasZandakaInterface
{
    /**
     * Get 伝票残高
     *
     * @return ?float
     */
    public function getZandaka(): ?float;

    /**
     * Set 伝票残高
     *
     * @param string|null $zandaka
     */
    public function setZandaka(string|null $zandaka);
}     