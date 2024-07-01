<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has 顧客コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasCodeInterface
{
    /**
     * Get 顧客コード
     *
     * @return ?string
     */
    public function getCode(): ?string;

    /**
     * Set 顧客コード
     *
     * @param ?string $code
     * @return $this
     */
    public function setCode(?string $code);
}