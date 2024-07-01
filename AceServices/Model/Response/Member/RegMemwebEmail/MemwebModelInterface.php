<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\RegMemwebEmail;

use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface for MemwebModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemwebModelInterface extends Mail\HasMailInterface
{

    /**
     * {@inheritDoc}
     */
    /** @SerializedName("EMAIL") */
    public function setMail(?string $mail);

    /**
     * Get 顧客ID
     *
     * @return ?string
     */
    public function getMbid(): ?string;

    /**
     * Set 顧客ID
     *
     * @param ?string $mbid
     */
    public function setMbid(?string $mbid);
}