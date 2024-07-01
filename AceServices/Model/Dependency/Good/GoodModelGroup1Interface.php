<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

use Plugin\AceClient\AceServices\Model\Dependency\Bikou;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;


/**
 * Interface for GoodModelGroup1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GoodModelGroup1Interface extends GoodModelBaseInterface,
                                           Bikou\HasThreeNotesInterface,
                                           HasGdidInterface
{
    /**
     * Get 名称
     */
    public function getGname(): ?string;

    /**
     * Set 名称
     */
    /** @SerializedName("NAME") */
    public function setGname(?string $gname);

    /**
     * Get 略名称
     */
    public function getSubName(): ?string;

    /**
     * Set 略名称
     */
    /** @SerializedName("SUBNM") */
    public function setSubName(?string $subName);

    /**
     * Get 納品明細出力区分
     *
     * @return int|null
     */
    public function getNprint(): ?int;

    /**
     * Set 納品明細出力区分
     *
     * @param int|null $Nprint
     * @return $this
     */
    public function setNprint(?int $Nprint);

    /**
     * Get 規格1
     *
     * @return ?string
     */
    public function getKikaku1(): ?string;

    /**
     * Set 規格1
     *
     * @param ?string $kikaku1
     * @return $this
     */
    public function setKikaku1(?string $kikaku1);

    /**
     * Get 規格2
     *
     * @return ?string
     */
    public function getKikaku2(): ?string;

    /**
     * Set 規格2
     *
     * @param ?string $kikaku2
     * @return $this
     */
    public function setKikaku2(?string $kikaku2);

    /**
     * Get 梱包数
     *
     * @return ?float
     */
    public function getKonpo(): ?float;

    /**
     * Set 梱包数
     *
     * @param string|null $konpo
     * @return $this
     */
    public function setKonpo(?string $konpo);

    /**
     * Get 削除フラグ
     *
     * @return ?int
     */
    public function getDelfg(): ?int;

    /**
     * Set 削除フラグ
     *
     * @param ?int $delfg
     * @return $this
     */
    public function setDelfg(?int $delfg);

    /**
     * Get 定期区分
     *
     * @return ?int
     */
    public function getTeiki(): ?int;

    /**
     * Set 定期区分
     *
     * @param ?int $teiki
     * @return $this
     */
    public function setTeiki(?int $teiki);

    /**
     * Get 直送区分
     *
     * @return ?int
     */
    public function getTyoku(): ?int;

    /**
     * Set 直送区分
     *
     * @param ?int $tyoku
     * @return $this
     */
    public function setTyoku(?int $tyoku);

    /**
     * Get 個人販売数
     *
     * @return ?int
     */
    public function getKgsuu(): ?int;

    /**
     * Set 個人販売数
     *
     * @param ?int $kgsuu
     * @return $this
     */
    public function setKgsuu(?int $kgsuu);

    /**
     * Get 全体販売数
     *
     * @return ?int
     */
    public function getZgsuu(): ?int;

    /**
     * Set 全体販売数
     *
     * @param ?int $zgsuu
     * @return $this
     */
    public function setZgsuu(?int $zgsuu);

    /**
     * Get 個人販売数開始日時
     *
     * @return ?AceDateTime\AceDateTimeInterface
     */
    public function getKgdate();

    /**
     * Set 個人販売数開始日時
     *
     * @param \DateTime|string|null $kgdate
     * @return $this
     */
    public function setKgdate($kgdate);

    /**
     * Get 全体販売数開始日時
     *
     * @return ?AceDateTime\AceDateTimeInterface
     */
    public function getZgdate();

    /**
     * Set 全体販売数開始日時
     *
     * @param \DateTime|string|null $zgdate
     * @return $this
     */
    public function setZgdate($zgdate);

    /**
     * Get 在庫確保数
     *
     * @return ?int
     */
    public function getKeepsuu(): ?int;

    /**
     * Set 在庫確保数
     *
     * @param ?int $keepsuu
     * @return $this
     */
    public function setKeepsuu(?int $keepsuu);

    /**
     * Get 品番ID
     *
     * @return ?string
     */
    public function getGhid(): ?string;

    /**
     * Set 品番ID
     *
     * @param ?string $ghid
     * @return $this
     */
    public function setGhid(?string $ghid);

    /**
     * Get 品番フリガナ
     *
     * @return ?string
     */
    public function getKana1(): ?string;

    /**
     * Set 品番フリガナ
     *
     * @param ?string $kana1
     * @return $this
     */
    public function setKana1(?string $kana1);

    /**
     * Get 名称
     *
     * @return ?string
     */
    public function getName1(): ?string;

    /**
     * Set 名称
     *
     * @param ?string $name1
     * @return $this
     */
    public function setName1(?string $name1);

    /**
     * Get 略名称
     *
     * @return ?string
     */
    public function getSubnm1(): ?string;

    /**
     * Set 略名称
     *
     * @param ?string $subnm1
     * @return $this
     */
    public function setSubnm1(?string $subnm1);
}