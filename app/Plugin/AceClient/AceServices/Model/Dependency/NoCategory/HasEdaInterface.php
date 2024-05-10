<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has 納品先住所枝番号
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasEdaInterface
{
    /**
     * Get 納品先枝番号
     * 
     * @return int|string|null
     */
    public function getEda(): int|string|null;

    /**
     * Set 納品先枝番号
     * 
     * @param int|string|null $name
     */
    public function setEda(int|string|null $eda);
}