<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Has 請求先顧客コード
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasScodeInterface
{
    /**
     * Get 請求先顧客コード
     *
     * @return ?string
     */
    public function getScode(): ?string;

    /**
     * Set 請求先顧客コード
     *
     * @param ?string $scode
     * @return $this
     */
    public function setScode(?string $scode): static;
}