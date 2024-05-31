<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail;

/**
 * Interface for Has メールアドレス
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasMailAdressInterface
{
    /**
    * Get メールアドレス
    *
    * @return ?string
    */
    public function getMailadress(): ?string;

    /**
     * Set メールアドレス
     *
     * @param ?string $mailadress
     * @return $this
     */
    public function setMailadress(?string $mailadress): static;

}