<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail;

use Symfony\Component\Serializer\Annotation\SerializedName;

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
    #[SerializedName('mailadress')]
    public function getMailAdress(): ?string;
    /**
     * Set メールアドレス
     *
     * @param ?string $mailadress
     */
    public function setMailAdress(?string $mailadress);

}