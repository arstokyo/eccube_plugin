<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Has 取引区分
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasToriKbnInterface
{
    /**
     * Get 取引区分
     * 
     * @return ?int
     */
    public function getTorikbn() : ?int;

    /**
     * Set 取引区分
     * 
     * @param ?int $torikbn
     */
    public function setTorikbn(?int $torikbn);
}