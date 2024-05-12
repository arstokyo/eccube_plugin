<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person\User;

/**
 * Interface for Has ユーザーID
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasUserIdInterface
{
    /**
     * Get ユーザーID
     * 
     * @return ?string ユーザーID
     */
    public function getUserid(): ?string;

    /**
     * Set ユーザーID
     * 
     * @param ?string $userId ユーザーID
     * @return $this
     */
    public function setUserid(?string $userId);
}