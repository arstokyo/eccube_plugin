<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Message;

/**
 * Interface for Has エラーメッセージ2
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasMessage2Interface
{
    /**
     * Get エラーメッセージ2
     */
    public function getMessage2(): ?string;

    /**
     * Set エラーメッセージ2
     *
     * @param ?string $message2
     * @return $this
     */
    public function setMessage2(?string $message2): static;
}