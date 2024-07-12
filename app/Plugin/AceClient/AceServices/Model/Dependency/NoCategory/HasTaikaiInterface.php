<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has 退会フラグ
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTaikaiInterface
{
    /**
     * Get 退会フラグ
     *
     * @return ?bool
     */
    public function getTaikai(): ?int;

    /**
     * Set 退会フラグ
     *
     * @param ?int $taikai
     * @return $this
     */
    public function setTaikai(?int $taikai);
}