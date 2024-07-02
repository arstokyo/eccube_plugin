<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetPointRireki;

use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Interface for PointModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface PointModelInterface extends Denpyo\HasDennoInterface,
                                      Day\HasJdayInterface,
                                      Day\HasDayInterface,
                                      Point\HasPointInterface
{
    /**
     * Get ポイント区分
     *
     * @return ?int
     */
    public function getKubun(): ?int;

    /**
     * Set ポイント区分
     *
     * @param ?int $kubun
     * @return $this
     */
    public function setKubun(?int $kubun): static;

    /**
     * Get 納品先枝番号
     *
     * @return ?int
     */
    public function getNouno(): ?int;

    /**
     * Set 納品先枝番号
     *
     * @param ?int $nouno
     * @return $this
     */
    public function setNouno(?int $nouno): static;

    /**
     * Get 受注枝番
     *
     * @return ?int
     */
    public function getEdano(): ?int;

    /**
     * Set 受注枝番
     *
     * @param ?int $edano
     * @return $this
     */
    public function setEdano(?int $edano): static;

    /**
     * Get ポイント種類
     *
     * @return ?int
     */
    public function getBrid(): ?int;

    /**
     * Set ポイント種類
     *
     * @param ?int $brid
     * @return $this
     */
    public function setBrid(?int $brid): static;

    /**
     * Get 使用区分
     *
     * @return ?int
     */
    public function getUsekbn(): ?int;

    /**
     * Set 使用区分
     *
     * @param ?int $usekbn
     * @return $this
     */
    public function setUsekbn(?int $usekbn): static;

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
    public function setMsyid(?int $msyid): static;

    /**
     * Get 顧客ID
     *
     * @return ?string
     */
    public function getJmemid(): ?string;

    /**
     * Set 顧客ID
     *
     * @param ?string $jmemid
     * @return $this
     */
    public function setJmemid(?string $jmemid): static;

    /**
     * Get 作成ユーザーID
     *
     * @return ?string
     */
    public function getCuser(): ?string;

    /**
     * Set 作成ユーザーID
     *
     * @param ?string $cuser
     * @return $this
     */
    public function setCuser(?string $cuser): static;

    /**
     * Get 更新ユーザーID
     *
     * @return ?string
     */
    public function getUuser(): ?string;

    /**
     * Set 更新ユーザーID
     *
     * @param ?string $uuser
     * @return $this
     */
    public function setUuser(?string $uuser): static;
}