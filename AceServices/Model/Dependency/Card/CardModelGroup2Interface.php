<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface for CardModelGroup2
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface CardModelGroup2Interface extends CardModelGroup1Interface
{
    /**
     * Get 通販AceSyID
     *
     * @return string|null
     */
    public function getInkokyakuid(): ?string;

    /**
     * Set 通販AceSyID
     *
     * @param string|null $inkokyakuid
     * @return $this
     */
    /** @SerializedName("in_kokyaku_id") */
    public function setInkokyakuid(?string $inkokyakuid);

    /**
     * Get 顧客コード
     *
     * @return string|null
     */
    public function getInchumonid(): ?string;

    /**
     * Set 顧客コード
     *
     * @param string|null $inchumonid
     * @return $this
     */
    /** @SerializedName("in_chumon_id") */
    public function setInchumonid(?string $inchumonid);

    /**
     * Get セッションID
     *
     * @return string|null
     */
    public function getIntokushu1(): ?string;

    /**
     * Set セッションID
     *
     * @param string|null $intokushu1
     * @return $this
     */
    /** @SerializedName("in_tokushu1") */
    public function setIntokushu1(?string $intokushu1);

    /**
     * Get 枝番号
     *
     * @return string|null
     */
    public function getIntokushu2(): ?string;

    /**
     * Set 枝番号
     *
     * @param string|null $intokushu2
     * @return $this
     */
    /** @SerializedName("in_tokushu2") */
    public function setIntokushu2(?string $intokushu2);

    /**
     * Get EC受付番号
     *
     * @return string|null
     */
    /** @SerializedName("uke_no") */
    public function getUkeno(): ?string;

    /**
     * Set EC受付番号
     *
     * @param string|null $ukeno
     * @return $this
     */
    /** @SerializedName("uke_no") */
    public function setUkeno(?string $ukeno);
}