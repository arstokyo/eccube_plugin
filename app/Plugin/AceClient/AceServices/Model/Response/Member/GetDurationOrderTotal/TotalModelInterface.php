<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetDurationOrderTotal;

use Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Interface for TotalModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface TotalModelInterface extends Good\HasGkbnInterface
{
    /**
     * Get 伝票合計
     *
     * @return ?int
     */
    public function getDentotal(): ?int;

    /**
     * Set 伝票合計
     *
     * @param ?int $dentotal
     * @return $this
     */
    public function setDentotal(?int $dentotal): static;
}