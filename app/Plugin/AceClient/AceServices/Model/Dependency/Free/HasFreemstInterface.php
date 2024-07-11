<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface For Freemst
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasFreemstInterface extends NoCategory\HasNameInterface,
                                      NoCategory\HasKubunInterface
{
    /**
     * Get フリー項目タイプ
     *
     * @return ?int
     */
    public function getType(): ?int;

    /**
     * Set フリー項目タイプ
     *
     * @param ?int $type
     * @return $this
     */
    public function setType(?int $type);

    /**
     * Get 表示順
     *
     * @return ?int
     */
    public function getJyun(): ?int;

    /**
     * Set 表示順
     *
     * @param ?int $jyun
     * @return $this
     */
    public function setJyun(?int $jyun);

    /**
     * Get 必須フラグ
     *
     * @return ?int
     */
    public function getReqflg(): ?int;

    /**
     * Set 必須フラグ
     *
     * @param ?int $reqflg
     * @return $this
     */
    public function setReqflg(?int $reqflg);

    /**
     * Get 説明
     *
     * @return ?string
     */
    public function getExplanation(): ?string;

    /**
     * Set 説明
     *
     * @param ?string $explanation
     * @return $this
     */
    public function setExplanation(?string $explanation);

    /**
     * Get 親フリー項目区分
     *
     * @return ?int
     */
    public function getOyakubun(): ?int;

    /**
     * Set 親フリー項目区分
     *
     * @param ?int $oyakubun
     * @return $this
     */
    public function setOyakubun(?int $oyakubun);

    /**
     * Get バックカラー
     *
     * @return ?string
     */
    public function getBgcolor(): ?string;

    /**
     * Set バックカラー
     *
     * @param ?string $bgcolor
     * @return $this
     */
    public function setBgcolor(?string $bgcolor);

    /**
     * Get データ読込位置
     *
     * @return ?int
     */
    public function getRpos(): ?int;

    /**
     * Set データ読込位置
     *
     * @param ?int $rpos
     * @return $this
     */
    public function setRpos(?int $rpos);

    /**
     * Get 最大文字数
     *
     * @return ?int
     */
    public function getLeng(): ?int;

    /**
     * Set 最大文字数
     *
     * @param ?int $leng
     * @return $this
     */
    public function setLeng(?int $leng);
}