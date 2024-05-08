<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has MailAdress
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
    public function getMailAdress(): ?string;
    /**
     * Set メールアドレス
     *
     * @param ?string $mailadress
     */
    public function setMailAdress(?string $mailadress);

}