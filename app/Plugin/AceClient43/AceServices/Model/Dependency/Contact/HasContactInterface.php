<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Contact;

use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface for HasContact
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasContactInterface extends Denpyo\HasDennoInterface,
                                      Good\HasGdidInterface,
                                      ContactBaseModelInterface
{
    /**
     * Get 初回日時
     *
     * @return ?AceDateTime\AceDateTimeInterface
     */
    public function getFdate();

    /**
     * Set 初回日時
     *
     * @param \DateTime|string|null $fdate
     * @return $this
     */
    public function setFdate($fdate);

    /**
     * Get バウンド区分
     *
     * @return ?int
     */
    public function getKind(): ?int;

    /**
     * Set バウンド区分
     *
     * @param ?int $kind
     * @return $this
     */
    public function setKind(?int $kind);

    /**
     * Get 顧客共有システムID
     *
     * @return ?int
     */
    public function getMsyid(): ?int;

    /**
     * Set 顧客共有システムID
     *
     * @param ?int $msyid
     * @return $this
     */
    public function setMsyid(?int $msyid);

    /**
     * Get 顧客／仕入先ID
     *
     * @return ?string
     */
    public function getEtcid(): ?string;

    /**
     * Set 顧客／仕入先ID
     *
     * @param ?string $etcid
     * @return $this
     */
    public function setEtcid(?string $etcid);

    /**
     * Get 納品先枝番
     *
     * @return ?int
     */
    public function getNouno(): ?int;

    /**
     * Set 納品先枝番
     *
     * @param ?int $nouno
     * @return $this
     */
    public function setNouno(?int $nouno);

    /**
     * Get 品番
     *
     * @return ?string
     */
    public function getGhid(): ?string;

    /**
     * Set 品番
     *
     * @param ?string $ghid
     * @return $this
     */
    public function setGhid(?string $ghid);

    /**
     * Get 最終グループ名
     *
     * @return ?string
     */
    public function getLastgroup(): ?string;

    /**
     * Set 最終グループ名
     *
     * @param ?string $lastgroup
     * @return $this
     */
    public function setLastgroup(?string $lastgroup);

    /**
     * Get フリーマスタ1
     *
     * @return ?string
     */
    public function getCfreemst1(): ?string;

    /**
     * Set フリーマスタ1
     *
     * @param ?string $cfreemst1
     * @return $this
     */
    public function setCfreemst1(?string $cfreemst1);

    /**
     * Get フリーメモ1
     *
     * @return ?string
     */
    public function getCfreememo1(): ?string;

    /**
     * Set フリーメモ1
     *
     * @param ?string $cfreememo1
     * @return $this
     */
    public function setCfreememo1(?string $cfreememo1);

    /**
     * Get フリー日付1
     *
     * @return ?AceDateTime\AceDateTimeInterface
     */
    public function getCfreeday1();

    /**
     * Set フリー日付1
     *
     * @param \DateTime|string|null $cfreeday1
     * @return $this
     */
    public function setCfreeday1($cfreeday1);

    /**
     * Get フリーデータ1
     *
     * @return ?string
     */
    public function getCfreedata1(): ?string;

    /**
     * Set フリーデータ1
     *
     * @param ?string $cfreedata1
     * @return $this
     */
    public function setCfreedata1(?string $cfreedata1);
}