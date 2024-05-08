<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has Mcode
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasMcodeInterface
{
    /**
    * Get 顧客コード
    *
    * @return ?string
    */
    public function getMcode(): ?string;

    /**
     * Set 顧客コード
     *
     * @param ?string $mcode
     */
    public function setMcode(?string $mcode);

}