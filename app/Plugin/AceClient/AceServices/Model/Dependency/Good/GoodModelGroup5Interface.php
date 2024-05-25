<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for GoodModelGroup5
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GoodModelGroup5Interface extends HasGdidInterface,
                                           NoCategory\HasNameInterface
{
    /**
     * Get 受注可能数
     *
     * @return ?int
     */
    public function getJsuu(): ?int;

    /**
     * Set 受注可能数
     *
     * @param ?int $jsuu
     * @return $this
     */
    public function setJsuu(?int $jsuu): static;
}