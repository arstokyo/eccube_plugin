<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Interface for Has ポイント種類
 *
 * @author kmorino
 */
interface HasPointKindInterface
{
    /**
     * Get ポイント種類
     *
     * @return ?int
     */
    public function getPointKind(): ?int;

    /**
     * Set ポイント種類
     *
     * @param ?int $PointKind
     * @return $this
     */
    public function setPointKind(?int $PointKind): static;
}