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
     * @return int|null
     */
    public function getPoint(): ?int;

    /**
     * Set ポイント
     *
     * @param int|null $point
     * @return $this
     */
    public function setPoint(?int $point);
}