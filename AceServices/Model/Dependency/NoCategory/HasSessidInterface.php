<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has セッションID
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasSessidInterface
{
    /**
     * Get セッションID
     * 
     * @return ?string セッションID
     */
    public function getSessid(): ?string;

    /**
     * Set セッションID
     * 
     * @param ?string $sessid セッションID
     * @return $this
     */
    public function setSessid(?string $sessid);
}