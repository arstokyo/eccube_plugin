<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

/**
 * Interface for Has 配送希望時間コード
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasHtimeInterface
{
    /**
     * Get 配送希望時間コード
     *
     * @return ?int
     */
    public function getHtime(): ?int;

    /**
     * Set 配送希望時間コード
     *
     * @param ?int $htime
     * @return $this
     */
    public function setHtime(?int $htime): static;
}