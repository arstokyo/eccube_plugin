<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has 顧客コード
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
     * @return $this
     */
    public function setMcode(?string $mcode);
}