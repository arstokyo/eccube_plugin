<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\UpdatePassword;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface UpdatePassword Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface UpdatePasswordRequestModelInterface extends RequestModelInterface,
                                                      NoCategory\HasPassWdInterface
{
    /**
    * {@inheritDoc}
    */
    /** @SerializedName("password") */
    public function setPasswd(?string $passwd);

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