<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has パスワード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasPassWdInterface
{
    /**
     * Get パスワード
     *
     * @return ?string パスワード
     */
    public function getPasswd(): ?string;

    /**
     * Set パスワード
     *
     * @param ?string $passwd パスワード
     * @return $this
     */
    public function setPasswd(?string $passwd): static;
}