<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Interface for Has 欠品区分
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasKpKbnInterface
{
    /**
     * Get 欠品区分
     *
     * @return ?int
     */
    public function getKpKbn(): ?int;

    /**
     * Set 欠品区分
     *
     * @param ?int $kpKbn
     */
    public function setKpKbn(?int $kpKbn);
}