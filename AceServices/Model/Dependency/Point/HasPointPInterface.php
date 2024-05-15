<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Interface for Has 加算ポイント
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasPointPInterface
{
    /**
     * Get 加算ポイント
     *
     * @return ?int
     */
    public function getPointP(): ?int;

    /**
     * Set 加算ポイント
     *
     * @param ?int $pointP
     */
    public function setPointP(?int $pointP);
}