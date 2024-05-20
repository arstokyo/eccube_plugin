<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Interface for Has ポイント
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasPointInterface
{
    /**
     * Get ポイント
     *
     * @return int|string|null
     */
    public function getPoint(): int|string|null;

    /**
     * Set ポイント
     *
     * @param int|string|null $point
     * @return $this
     */
    public function setPoint(int|string|null $point): static;
}