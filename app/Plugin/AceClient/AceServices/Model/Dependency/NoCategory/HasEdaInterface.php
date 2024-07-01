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
    public function getEda(): ?string;

    /**
     * Set 納品先枝番号
     *
     * @param int|string|null $eda
     * @return $this
     */
    public function setEda(?string $eda);
}