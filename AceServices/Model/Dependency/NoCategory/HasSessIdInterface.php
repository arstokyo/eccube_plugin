<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has セッションID
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasSessIdInterface
{
    /**
     * Get セッションID
     *
     * @return ?string セッションID
     */
    public function getSessId(): ?string;

    /**
     * Set セッションID
     *
     * @param ?string $sessId セッションID
     * @return $this
     */
    public function setSessId(?string $sessId): static;
}