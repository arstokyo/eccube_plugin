<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\Free;
use Plugin\AceClient\AceServices\Model\Dependency\Point;
use Plugin\AceClient\AceServices\Model\Dependency\Zaiko;

/**
 * Interface for GoodModelGroup2
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GoodModelGroup2Interface extends GoodModelBaseInterface,
                                           NoCategory\HasTwoImagesInterface,
                                           Cost\Tanka\HasNineTankaInterface,
                                           Free\HasThreeFcodeInterface,
                                           Free\HasThreeFnameInterface,
                                           Free\HasThreeFmemoInterface,
                                           Free\HasThreeFdayInterface,
                                           Free\HasThreeFreeInterface,
                                           Cost\Tax\HasTaxKbnInterface,
                                           HasReizouInterface,
                                           HasReitouInterface,
                                           HasJyouonInterface,
                                           HasGcodeInterface,
                                           Point\HasPointInterface,
                                           Zaiko\HasZaikoInterface
{
    /**
    * Get 画像ファイル１
    */
    public function getImage1(): ?string;

    /**
    * Set 画像ファイル１
    */
    public function setImage1(?string $image1): static;

    /**
    * Get 画像ファイル２
    */
    public function getImage2(): ?string;

    /**
    * Set 画像ファイル２
    */
    public function setImage2(?string $image2): static;

    /**
     * Get 大分類コード
     *
     * @return ?string
     */
    public function getDbun(): ?string;

    /**
     * Set 大分類コード
     *
     * @param ?string $dbun
     * @return $this
     */
    public function setDbun(?string $dbun): static;

    /**
     * Get 大分類コード名称
     *
     * @return ?string
     */
    public function getDbunname(): ?string;

    /**
     * Set 大分類コード名称
     *
     * @param ?string $dbunname
     * @return $this
     */
    public function setDbunname(?string $dbunname): static;

    /**
     * Get 中分類コード
     *
     * @return ?string
     */
    public function getTbun(): ?string;

    /**
     * Set 中分類コード
     *
     * @param ?string $tbun
     * @return $this
     */
    public function setTbun(?string $tbun): static;

    /**
     * Get 中分類コード名称
     *
     * @return ?string
     */
    public function getTbunname(): ?string;

    /**
     * Set 中分類コード名称
     *
     * @param ?string $tbunname
     * @return $this
     */
    public function setTbunname(?string $tbunname): static;

    /**
     * Get 小分類コード
     *
     * @return ?string
     */
    public function getSbun(): ?string;

    /**
     * Set 小分類コード
     *
     * @param ?string $sbun
     * @return $this
     */
    public function setSbun(?string $sbun): static;

    /**
     * Get 小分類コード名称
     *
     * @return ?string
     */
    public function getSbunname(): ?string;

    /**
     * Set 小分類コード名称
     *
     * @param ?string $sbunname
     * @return $this
     */
    public function setSbunname(?string $sbunname): static;

    /**
     * Get 備考
     *
     * @return ?string
     */
    public function getBikou(): ?string;

    /**
     * Set 備考
     *
     * @param ?string $bikou
     * @return $this
     */
    public function setBikou(?string $bikou): static;

    /**
     * Get 棚番号
     *
     * @return ?string
     */
    public function getTanano(): ?string;

    /**
     * Set 棚番号
     *
     * @param ?string $tanano
     * @return $this
     */
    public function setTanano(?string $tanano): static;

    /**
     * Get 確保数
     *
     * @return ?int
     */
    public function getKakuho(): ?int;

    /**
     * Set 確保数
     *
     * @param ?int $kakuho
     * @return $this
     */
    public function setKakuho(?int $kakuho): static;

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
    public function setKonpo(string|null $konpo): static;

    /**
     * Get 掛売顧客税
     *
     * @return ?int
     */
    public function getOtaxkbn(): ?int;

    /**
     * Set 掛売顧客税
     *
     * @param ?int $otaxkbn
     * @return $this
     */
    public function setOtaxkbn(?int $otaxkbn): static;

    /**
     * Get 総額端数
     *
     * @return ?int
     */
    public function getSougakuhkbn(): ?int;

    /**
     * Set 総額端数
     *
     * @param ?int $sougakuhkbn
     * @return $this
     */
    public function setSougakuhkbn(?int $sougakuhkbn): static;

    /**
     * Get ポイント掛率対象区分
     *
     * @return ?int
     */
    public function getPointkake(): ?int;

    /**
     * Set ポイント掛率対象区分
     *
     * @param ?int $pointkake
     * @return $this
     */
    public function setPointkake(?int $pointkake): static;
}