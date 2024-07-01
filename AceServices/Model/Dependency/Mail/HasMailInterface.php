<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail;

/**
 * Interface for Has メール
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasMailInterface
{
    /**
     * Get メール
     * 
     * @return ?string
     */
    public function getMail(): ?string;

    /**
     * Set メール
     * 
     * @param ?string $mail
     * @return $this
     */
    public function setMail(?string $mail);

}