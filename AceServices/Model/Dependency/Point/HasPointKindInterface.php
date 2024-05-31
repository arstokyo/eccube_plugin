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
    public function getPointkind(): ?int;

    /**
     * Set ポイント種類
     *
     * @param ?int $pointkind
     * @return $this
     */
    public function setPointkind(?int $pointkind): static;
}