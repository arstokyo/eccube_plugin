<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Message;

/**
 * Interface for Has エラーメッセージ1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasMessage1Interface
{
    /**
     * Get エラーメッセージ1
     */
    public function getMessage1(): ?string;

    /**
     * Set エラーメッセージ1
     *
     * @param ?string $message1
     * @return $this
     */
    public function setMessage1(?string $message1);
}