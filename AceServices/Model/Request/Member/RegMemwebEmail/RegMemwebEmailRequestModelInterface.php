<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemwebEmail;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface RegMemwebEmail Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface RegMemwebEmailRequestModelInterface extends RequestModelInterface,
                                                      Mail\HasMailInterface
{
    /**
    * {@inheritDoc}
    */
    /** @SerializedName("email") */
    public function setMail(?string $mail);

    /**
     * Get 通販AceシステムID
     *
     * @return ?int
     */
    public function getSyid(): ?int;

    /**
     * Set 通販AceシステムID
     *
     * @param ?int $syid
     * @return $this
     */
    public function setSyid(?int $syid);

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
     * @return $this
     */
    public function setMbid(?string $mbid);
}