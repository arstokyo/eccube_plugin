<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has 請求先コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasIcodeInterface
{
    /**
     * Get 請求先コード
     *
     * @return ?string
     */
    public function getIcode(): ?string;

    /**
     * Set 請求先コード
     *
     * @param ?string $icode
     * @return $this
     */
    public function setIcode(?string $icode): static;
}