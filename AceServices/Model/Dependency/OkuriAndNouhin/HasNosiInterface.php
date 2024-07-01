<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\OkuriAndNouhin;

/**
 * Interface for Has のし
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasNosiInterface
{
    /**
     * Get のし
     *
     * @return ?string
     */
    public function getNosi(): ?string;

    /**
     * Set のし
     *
     * @param ?string $nosi
     * @return $this
     */
    public function setNosi(?string $nosi);
}